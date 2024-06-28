pipeline {
    agent any
    environment {
        DEPLOY_SERVER = 'ubuntu@34.207.135.0'
        DEPLOY_PATH = '/var/www/sturdy-winner'
        EMAIL_RECIPIENTS = 'ahmetfarukpala@gmail.com'
    }
    stages {
        stage('Checkout') {
            steps {
                git 'https://github.com/afpthedev/sturdy-winner.git'
            }
        }
        stage('Install Dependencies') {
            steps {
                script {
                    try {
                        sh 'composer install'
                    } catch (Exception e) {
                        currentBuild.result = 'FAILURE'
                        error 'Dependency installation failed!'
                    }
                }
            }
        }
        stage('Run Tests') {
            steps {
                script {
                    try {
                        sh 'php artisan test'
                    } catch (Exception e) {
                        currentBuild.result = 'FAILURE'
                        error 'Tests failed!'
                    }
                }
            }
        }
        stage('Deploy') {
            when {
                expression { currentBuild.result == null || currentBuild.result == 'SUCCESS' }
            }
            steps {
                script {
                    try {
                        sh """
                        ssh -o StrictHostKeyChecking=no $DEPLOY_SERVER << EOF
                        rm -rf $DEPLOY_PATH/*
                        exit
EOF
                        scp -r * $DEPLOY_SERVER:$DEPLOY_PATH
                        ssh -o StrictHostKeyChecking=no $DEPLOY_SERVER << EOF
                        cd $DEPLOY_PATH
                        composer install --no-dev
                        php artisan migrate --force
                        php artisan config:cache
                        php artisan route:cache
                        php artisan view:cache
                        exit
EOF
                        """
                    } catch (Exception e) {
                        currentBuild.result = 'FAILURE'
                        error 'Deployment failed!'
                    }
                }
            }
        }
    }
    post {
        always {
            echo 'Cleaning up...'
        }
        success {
            echo 'Pipeline succeeded!'
        }
        failure {
            echo 'Pipeline failed!'
            mail to: "${EMAIL_RECIPIENTS}",
                 subject: "Jenkins Pipeline Failed: ${currentBuild.fullDisplayName}",
                 body: "Something is wrong with ${env.JOB_NAME} - Build #${env.BUILD_NUMBER}.\nPlease check the Jenkins console output for more details: ${env.BUILD_URL}"
        }
    }
}
