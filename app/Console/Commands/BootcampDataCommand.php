<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Programme;

class BootcampDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bootcamp:data-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach($this->getData() as $programme){
            $newProgramme = Programme::firstOrCreate([
                'name'=>$programme['name'],
                'icon'=>$programme['icon'],
                'type'=>'bootcamp'
                ]);
                foreach($programme['bootcamps'] as $bootcamp){
                    $newBootcamp = $newProgramme->bootcamps()->firstOrCreate([
                        'title'=>$bootcamp['title'],
                        'description'=>$bootcamp['description'],
                        'icon'=>$bootcamp['icon'],
                    ]);

                    foreach($bootcamp['projects'] as $project){
                        $newProject = $newBootcamp->projects()->firstOrCreate([
                            'name'=>$project['name'],
                            'description'=>$project['description'],
                            ]);

                        foreach($project['steps'] as $step){
                            $newProject->steps()->firstOrCreate(['title'=>$step]);
                        }

                        foreach($project['tools'] as $tool){
                            $newProject->tools()->firstOrCreate(['name'=>$tool]);
                        }
                            
                    }
                }
        }
    }

    public function getData()
    {
        return [
            [
                'name' => "Cloud Computing & DevOps",
                "icon" => "fas fa-cloud",
                "bootcamps" => [
                    [
                        "title" => "Cloud & DevOps Engineering Bootcamp: Automate & Scale",
                        "description" => "Learn cloud platforms and DevOps automation tools through real-world projects.",
                        "icon" => "fas fa-server",
                        "projects" => [
                            [
                                "name" => "Automated Deployment Pipeline for Web Applications",
                                "description" => "Build a CI/CD pipeline using GitHub Actions, Jenkins, and Kubernetes to automate software deployment.",
                                "tools" => ["Git", "Jenkins", "Docker", "Kubernetes", "Terraform", "AWS/Azure"],
                                "steps" => [
                                    "Understanding the project requirements & setting up the environment",
                                    "Setting up version control with Git & GitHub",
                                    "Creating a basic application and containerizing it with Docker",
                                    "Deploying containers to Kubernetes",
                                    "Setting up a CI/CD pipeline with Jenkins",
                                    "Using Terraform to automate cloud infrastructure setup",
                                    "Implementing monitoring & security best practices",
                                    "Finalizing, testing, and deploying the project"
                                ]
                            ],
                            [
                                "name" => "Scalable Microservices on AWS using Kubernetes",
                                "description" => "Develop a microservices-based system and deploy it to AWS with Kubernetes and cloud automation tools.",
                                "tools" => ["AWS EKS", "Docker", "Microservices", "Kubernetes", "CloudFormation"],
                                "steps" => [
                                    "Project introduction: Understanding microservices and cloud-native architectures",
                                    "Designing and implementing microservices with REST APIs",
                                    "Containerizing each microservice with Docker",
                                    "Configuring Kubernetes clusters on AWS",
                                    "Automating deployments using AWS CloudFormation",
                                    "Implementing logging and monitoring for microservices",
                                    "Enhancing security with IAM and network policies",
                                    "Deploying the full system and final testing"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "AWS & Azure Cloud Mastery Bootcamp: Infrastructure & Deployment",
                        "description" => "Deploy and manage cloud-based applications on AWS and Azure through hands-on projects.",
                        "icon" => "fas fa-cloud-upload-alt",
                        "projects" => [
                            [
                                "name" => "Serverless E-Commerce Backend on AWS",
                                "description" => "Build a fully serverless e-commerce backend using AWS Lambda, API Gateway, and DynamoDB.",
                                "tools" => ["AWS Lambda", "API Gateway", "DynamoDB", "S3", "IAM"],
                                "steps" => [
                                    "Project overview: Understanding serverless computing",
                                    "Setting up API Gateway for handling requests",
                                    "Implementing AWS Lambda functions for business logic",
                                    "Using DynamoDB as a NoSQL database for storing data",
                                    "Implementing user authentication with AWS Cognito",
                                    "Enhancing security with IAM roles and permissions",
                                    "Optimizing performance and monitoring using AWS CloudWatch",
                                    "Finalizing, testing, and deploying the project"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "DevOps Essentials Bootcamp: CI/CD, Containers & Kubernetes",
                        "description" => "Master DevOps by building an automated software deployment pipeline.",
                        "icon" => "fas fa-sync",
                        "projects" => [
                            [
                                "name" => "CI/CD Pipeline for a React & Node.js Application",
                                "description" => "Set up an automated CI/CD pipeline for a full-stack web application using Jenkins and Kubernetes.",
                                "tools" => ["Jenkins", "Docker", "Kubernetes", "Nginx", "Helm"],
                                "steps" => [
                                    "Project overview: Understanding CI/CD pipelines",
                                    "Containerizing the application with Docker",
                                    "Setting up Jenkins for automated builds and deployments",
                                    "Deploying the application using Kubernetes and Helm",
                                    "Implementing rollback strategies for failed deployments",
                                    "Monitoring logs and analyzing pipeline performance",
                                    "Final testing and deploying the project"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Cloud Security & DevOps Bootcamp: Build & Maintain Secure Systems",
                        "description" => "Implement DevSecOps best practices to secure cloud applications.",
                        "icon" => "fas fa-user-shield",
                        "projects" => [
                            [
                                "name" => "Securing a Cloud-Based Web Application",
                                "description" => "Implement security best practices for a cloud-hosted web application.",
                                "tools" => ["IAM", "Firewall Rules", "SSL/TLS", "VPC Security", "SIEM"],
                                "steps" => [
                                    "Understanding cloud security threats and best practices",
                                    "Implementing role-based access control using IAM policies",
                                    "Securing API endpoints with authentication and rate limiting",
                                    "Encrypting data at rest and in transit using SSL/TLS",
                                    "Setting up a secure VPC with firewall rules",
                                    "Implementing logging and threat detection with SIEM tools",
                                    "Final testing and security review"
                                ]
                            ]
                        ]
                    ]
                ]
            ],

            // web development Bootcamp
            [
                'name' => "Web Development",
                "icon" => "fas fa-code",
                "bootcamps" => [
                    [
                        "title" => "Full-Stack Web Development Bootcamp: Build Modern Web Applications",
                        "description" => "Learn front-end and back-end development by building real-world web applications.",
                        "icon" => "fas fa-laptop-code",
                        "projects" => [
                            [
                                "name" => "E-Commerce Website with Admin Panel",
                                "description" => "Develop a full-fledged online store with product listings, shopping cart, and order management.",
                                "tools" => ["HTML", "CSS", "JavaScript", "React", "Node.js", "Express.js", "MongoDB"],
                                "steps" => [
                                    "Understanding project requirements & setting up the environment",
                                    "Designing UI with HTML, CSS, and Bootstrap",
                                    "Building product listings and shopping cart with React",
                                    "Creating a REST API with Express.js and MongoDB",
                                    "Implementing authentication and user roles",
                                    "Developing an admin panel for product and order management",
                                    "Integrating payment gateways (PayPal, Stripe)",
                                    "Testing, debugging, and deploying the application"
                                ]
                            ],
                            [
                                "name" => "Social Media Platform",
                                "description" => "Build a basic social networking site with user profiles, posts, and real-time interactions.",
                                "tools" => ["React", "Firebase", "Node.js", "Express.js", "MongoDB"],
                                "steps" => [
                                    "Project overview: Understanding social media app features",
                                    "Setting up authentication with Firebase",
                                    "Creating user profiles and friend connections",
                                    "Implementing real-time chat functionality",
                                    "Building post creation and news feed",
                                    "Adding notifications and like/comment features",
                                    "Deploying the app using Firebase Hosting or Vercel"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Front-End Web Development Bootcamp: Master Modern UI/UX",
                        "description" => "Create interactive and responsive web applications with modern front-end tools.",
                        "icon" => "fas fa-paint-brush",
                        "projects" => [
                            [
                                "name" => "Portfolio Website",
                                "description" => "Design and build a personal portfolio website to showcase skills and projects.",
                                "tools" => ["HTML", "CSS", "JavaScript", "React", "Tailwind CSS"],
                                "steps" => [
                                    "Understanding project goals and UI/UX design principles",
                                    "Structuring pages using HTML and CSS",
                                    "Creating smooth animations and interactive elements",
                                    "Using JavaScript for dynamic content and form handling",
                                    "Building a React-based version for advanced interactivity",
                                    "Deploying the portfolio on GitHub Pages or Netlify"
                                ]
                            ],
                            [
                                "name" => "Real-Time Weather App",
                                "description" => "Develop a weather forecasting web app using external APIs.",
                                "tools" => ["JavaScript", "React", "REST APIs", "CSS"],
                                "steps" => [
                                    "Setting up the development environment",
                                    "Fetching weather data using OpenWeatherMap API",
                                    "Displaying current weather and forecasts",
                                    "Adding search functionality for different locations",
                                    "Styling the app with Tailwind CSS",
                                    "Deploying the app to the web"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Back-End Web Development Bootcamp: APIs & Databases",
                        "description" => "Master back-end tools by building scalable APIs and databases.",
                        "icon" => "fas fa-database",
                        "projects" => [
                            [
                                "name" => "Blogging Platform API",
                                "description" => "Develop a RESTful API for a blogging platform with authentication and content management.",
                                "tools" => ["Node.js", "Express.js", "MongoDB", "JWT"],
                                "steps" => [
                                    "Understanding RESTful APIs and back-end architecture",
                                    "Setting up Express.js and connecting to MongoDB",
                                    "Implementing authentication and user management with JWT",
                                    "Creating API endpoints for blog posts and comments",
                                    "Implementing role-based access control",
                                    "Deploying the API to a cloud server"
                                ]
                            ],
                            [
                                "name" => "URL Shortener Service",
                                "description" => "Build a URL shortening service similar to Bitly.",
                                "tools" => ["Node.js", "Express.js", "MongoDB", "Redis"],
                                "steps" => [
                                    "Setting up Express.js and MongoDB",
                                    "Creating API endpoints for generating short URLs",
                                    "Implementing URL redirection and tracking",
                                    "Adding analytics to monitor link performance",
                                    "Deploying the service to a cloud platform"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Full-Stack MERN Bootcamp: Build & Deploy Scalable Web Apps",
                        "description" => "Learn the MERN (MongoDB, Express.js, React, Node.js) stack through hands-on projects.",
                        "icon" => "fas fa-code-branch",
                        "projects" => [
                            [
                                "name" => "Task Management App",
                                "description" => "Create a full-stack task manager with user authentication and real-time updates.",
                                "tools" => ["MongoDB", "Express.js", "React", "Node.js", "WebSockets"],
                                "steps" => [
                                    "Understanding the task management concept and features",
                                    "Building the front-end with React",
                                    "Setting up the back-end with Node.js and Express.js",
                                    "Connecting the app to MongoDB for data storage",
                                    "Implementing WebSockets for real-time updates",
                                    "Testing and deploying the application"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
           // Data Science & Analytics Bootcamp
            [
                'name' => "Data Science & Analytics",
                "icon" => "fas fa-chart-line",
                "bootcamps" => [
                    [
                        "title" => "Data Science Bootcamp: Build Real-World AI & ML Models",
                        "description" => "Learn data science by working on real-world projects and building machine learning models.",
                        "icon" => "fas fa-brain",
                        "projects" => [
                            [
                                "name" => "Customer Churn Prediction",
                                "description" => "Predict customer churn using machine learning models.",
                                "tools" => ["Python", "Pandas", "Scikit-Learn", "Matplotlib"],
                                "steps" => [
                                    "Understanding business problem and dataset",
                                    "Data cleaning and preprocessing",
                                    "Exploratory Data Analysis (EDA) and visualization",
                                    "Feature engineering and selection",
                                    "Training machine learning models (Logistic Regression, Random Forest, XGBoost)",
                                    "Model evaluation and hyperparameter tuning",
                                    "Deploying the model as a REST API"
                                ]
                            ],
                            [
                                "name" => "Sentiment Analysis on Social Media Data",
                                "description" => "Analyze customer reviews and social media data for sentiment classification.",
                                "tools" => ["Python", "NLTK", "TensorFlow", "Flask"],
                                "steps" => [
                                    "Collecting and cleaning text data from social media",
                                    "Preprocessing text with tokenization and stopword removal",
                                    "Building a machine learning classifier (Naïve Bayes, SVM, or LSTM)",
                                    "Visualizing sentiment trends with word clouds and bar charts",
                                    "Deploying the model as a Flask-based web app"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Data Analytics Bootcamp: Business Intelligence & Visualization",
                        "description" => "Master data analytics by analyzing real-world business data and creating dashboards.",
                        "icon" => "fas fa-chart-pie",
                        "projects" => [
                            [
                                "name" => "Sales Performance Dashboard",
                                "description" => "Develop a dashboard for analyzing company sales performance over time.",
                                "tools" => ["Excel", "Power BI", "Tableau", "SQL"],
                                "steps" => [
                                    "Understanding sales data and KPI requirements",
                                    "Data cleaning and transformation using Excel/SQL",
                                    "Creating visualizations using Power BI or Tableau",
                                    "Building interactive dashboards for business insights",
                                    "Publishing and sharing reports with stakeholders"
                                ]
                            ],
                            [
                                "name" => "Customer Segmentation using Clustering",
                                "description" => "Segment customers based on purchasing behavior using clustering techniques.",
                                "tools" => ["Python", "K-Means Clustering", "Seaborn"],
                                "steps" => [
                                    "Loading and exploring customer transaction data",
                                    "Applying feature scaling and data normalization",
                                    "Using K-Means clustering to group customers",
                                    "Visualizing customer segments and behavioral patterns",
                                    "Providing business recommendations based on clusters"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Machine Learning & AI Bootcamp: Build Predictive Models",
                        "description" => "Develop AI-powered applications using machine learning models.",
                        "icon" => "fas fa-robot",
                        "projects" => [
                            [
                                "name" => "Credit Risk Prediction",
                                "description" => "Predict whether a customer is likely to default on a loan.",
                                "tools" => ["Python", "Scikit-Learn", "XGBoost", "Streamlit"],
                                "steps" => [
                                    "Understanding credit risk and dataset structure",
                                    "Data preprocessing and feature selection",
                                    "Building and training classification models",
                                    "Evaluating model performance (accuracy, precision-recall)",
                                    "Deploying the model using Streamlit"
                                ]
                            ],
                            [
                                "name" => "Image Classification with Deep Learning",
                                "description" => "Develop a deep learning model to classify images using CNNs.",
                                "tools" => ["Python", "TensorFlow", "Keras", "OpenCV"],
                                "steps" => [
                                    "Preparing and augmenting image datasets",
                                    "Building a Convolutional Neural Network (CNN)",
                                    "Training and fine-tuning the model",
                                    "Evaluating model accuracy and reducing overfitting",
                                    "Deploying the model for real-time image classification"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Big Data & Cloud Analytics Bootcamp",
                        "description" => "Work with big data frameworks and cloud-based analytics platforms.",
                        "icon" => "fas fa-database",
                        "projects" => [
                            [
                                "name" => "Log Analysis for Cybersecurity",
                                "description" => "Analyze large-scale logs to detect security threats and anomalies.",
                                "tools" => ["Hadoop", "Spark", "Python", "ELK Stack"],
                                "steps" => [
                                    "Collecting and preprocessing log data",
                                    "Using Apache Spark for distributed data analysis",
                                    "Applying machine learning for anomaly detection",
                                    "Visualizing security threats using ELK Stack",
                                    "Automating log analysis with cloud-based solutions"
                                ]
                            ],
                            [
                                "name" => "Real-Time Stock Market Analysis",
                                "description" => "Analyze live stock market data and predict trends using big data tools.",
                                "tools" => ["Apache Kafka", "Python", "Pandas", "TensorFlow"],
                                "steps" => [
                                    "Fetching real-time stock data using APIs",
                                    "Processing data streams with Apache Kafka",
                                    "Building a predictive model for stock price movements",
                                    "Creating interactive dashboards for stock trend analysis",
                                    "Deploying the solution on cloud infrastructure"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            // Blockchain & Web3 Development Bootcamp
            [
                'name' => "Blockchain & Web3 Development",
                "icon" => "fas fa-coins",
                "bootcamps" => [
                    [
                        "title" => "Blockchain Development Bootcamp: Smart Contracts & DApps",
                        "description" => "Learn to build decentralized applications by developing and deploying smart contracts.",
                        "icon" => "fas fa-link",
                        "projects" => [
                            [
                                "name" => "Decentralized Voting System",
                                "description" => "Develop a secure and transparent blockchain-based voting system.",
                                "tools" => ["Solidity", "Ethereum", "Web3.js", "React"],
                                "steps" => [
                                    "Understanding the voting process and blockchain security",
                                    "Writing a secure smart contract for voting using Solidity",
                                    "Deploying the contract on Ethereum testnet",
                                    "Building a front-end using React and Web3.js",
                                    "Testing and interacting with the decentralized voting system"
                                ]
                            ],
                            [
                                "name" => "NFT Marketplace",
                                "description" => "Create a decentralized NFT marketplace for minting, buying, and selling NFTs.",
                                "tools" => ["Solidity", "IPFS", "Ethereum", "React"],
                                "steps" => [
                                    "Creating an ERC-721 smart contract for NFTs",
                                    "Integrating IPFS for decentralized storage",
                                    "Building a Web3-based marketplace interface using React",
                                    "Implementing smart contract functions for minting and transactions",
                                    "Testing and deploying the marketplace"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Ethereum & Solidity Bootcamp: Decentralized Application Development",
                        "description" => "Master Solidity and Ethereum by building real-world decentralized applications.",
                        "icon" => "fas fa-ethereum",
                        "projects" => [
                            [
                                "name" => "Decentralized Crowdfunding Platform",
                                "description" => "Develop a blockchain-based crowdfunding platform for secure fundraising.",
                                "tools" => ["Solidity", "Truffle", "Ganache", "Web3.js"],
                                "steps" => [
                                    "Defining the crowdfunding logic and business model",
                                    "Writing the Solidity smart contract for fundraising",
                                    "Deploying the contract using Truffle and Ganache",
                                    "Building a front-end with Web3.js for contributors",
                                    "Ensuring secure transactions and funds distribution"
                                ]
                            ],
                            [
                                "name" => "Supply Chain Management on Blockchain",
                                "description" => "Track product movement using blockchain for transparency and security.",
                                "tools" => ["Solidity", "Hyperledger Fabric", "IPFS"],
                                "steps" => [
                                    "Designing the supply chain flow",
                                    "Developing smart contracts for tracking products",
                                    "Integrating blockchain with a decentralized database (IPFS)",
                                    "Building a dashboard for supply chain visualization",
                                    "Testing for security and fraud prevention"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Web3 & DeFi Bootcamp: Building the Future of Finance",
                        "description" => "Explore decentralized finance (DeFi) and develop Web3 financial applications.",
                        "icon" => "fas fa-wallet",
                        "projects" => [
                            [
                                "name" => "Decentralized Exchange (DEX)",
                                "description" => "Build a DEX for users to swap cryptocurrencies without intermediaries.",
                                "tools" => ["Solidity", "Uniswap Protocol", "React", "Metamask"],
                                "steps" => [
                                    "Understanding Automated Market Makers (AMMs)",
                                    "Writing smart contracts for token swapping",
                                    "Integrating Uniswap’s liquidity pool",
                                    "Building a front-end using React and Web3.js",
                                    "Testing transactions using Metamask and testnet"
                                ]
                            ],
                            [
                                "name" => "Yield Farming & Staking Platform",
                                "description" => "Develop a DeFi protocol for users to stake tokens and earn rewards.",
                                "tools" => ["Solidity", "Ethereum", "React", "Hardhat"],
                                "steps" => [
                                    "Designing a staking smart contract with yield calculations",
                                    "Deploying the contract on Ethereum testnet",
                                    "Integrating a token rewards system",
                                    "Building an intuitive Web3-based staking interface",
                                    "Auditing security for smart contract vulnerabilities"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Crypto & Blockchain Security Bootcamp: Securing Digital Assets",
                        "description" => "Master blockchain security and protect crypto assets from vulnerabilities.",
                        "icon" => "fas fa-shield-alt",
                        "projects" => [
                            [
                                "name" => "Blockchain Wallet Security Enhancement",
                                "description" => "Develop a secure crypto wallet with encryption and multi-signature support.",
                                "tools" => ["Node.js", "Solidity", "Web3.js", "MetaMask"],
                                "steps" => [
                                    "Implementing encryption for private keys",
                                    "Developing a multi-signature wallet using Solidity",
                                    "Integrating Web3 authentication with MetaMask",
                                    "Testing for security flaws like re-entrancy attacks",
                                    "Deploying on Ethereum testnet"
                                ]
                            ],
                            [
                                "name" => "Smart Contract Security Audit",
                                "description" => "Perform a security audit on Solidity smart contracts to identify vulnerabilities.",
                                "tools" => ["MythX", "Slither", "Remix IDE"],
                                "steps" => [
                                    "Identifying common Solidity vulnerabilities",
                                    "Using MythX and Slither for automated security analysis",
                                    "Performing manual review of Solidity contracts",
                                    "Testing attack scenarios like re-entrancy and integer overflows",
                                    "Providing a security report with recommendations"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Decentralized Applications (DApps) Bootcamp: Web3 in Action",
                        "description" => "Develop scalable DApps and integrate blockchain tools into applications.",
                        "icon" => "fas fa-cube",
                        "projects" => [
                            [
                                "name" => "Decentralized Social Media Platform",
                                "description" => "Create a censorship-resistant social media app on blockchain.",
                                "tools" => ["Solidity", "IPFS", "Ethereum", "React"],
                                "steps" => [
                                    "Designing a decentralized architecture",
                                    "Building smart contracts for user interactions",
                                    "Integrating IPFS for storing media content",
                                    "Developing a React-based Web3 UI",
                                    "Testing and deploying on Ethereum testnet"
                                ]
                            ],
                            [
                                "name" => "Decentralized Freelance Marketplace",
                                "description" => "Build a blockchain-powered freelancing platform without intermediaries.",
                                "tools" => ["Solidity", "Polygon", "Web3.js", "React"],
                                "steps" => [
                                    "Writing smart contracts for gig posting and escrow payments",
                                    "Deploying contracts on the Polygon network for lower fees",
                                    "Building a Web3 front-end with React",
                                    "Ensuring secure and dispute-free payments",
                                    "Testing and deploying the platform"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            // Artificial Intelligence & Machine Learning Bootcamps
            [
                'name' => "Artificial Intelligence & Machine Learning",
                "icon" => "fas fa-robot",
                "bootcamps" => [
                    [
                        "title" => "Machine Learning Bootcamp: Build & Deploy Predictive Models",
                        "description" => "Learn supervised and unsupervised learning by developing real-world ML models.",
                        "icon" => "fas fa-chart-line",
                        "projects" => [
                            [
                                "name" => "Customer Churn Prediction System",
                                "description" => "Build an ML model to predict customer churn for a telecom company.",
                                "tools" => ["Python", "Scikit-Learn", "Pandas", "Flask"],
                                "steps" => [
                                    "Collect and preprocess customer behavior data",
                                    "Train a classification model using Scikit-Learn",
                                    "Evaluate model performance using accuracy and precision",
                                    "Deploy the model as an API using Flask",
                                    "Build a simple front-end to display predictions"
                                ]
                            ],
                            [
                                "name" => "Fraud Detection System",
                                "description" => "Develop a machine learning model to detect fraudulent transactions in financial data.",
                                "tools" => ["Python", "TensorFlow", "XGBoost", "FastAPI"],
                                "steps" => [
                                    "Understanding fraud patterns in financial transactions",
                                    "Training an anomaly detection model using XGBoost",
                                    "Deploying the model as a FastAPI service",
                                    "Building an interactive dashboard to monitor transactions",
                                    "Testing and improving model accuracy"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Deep Learning Bootcamp: Neural Networks & Computer Vision",
                        "description" => "Master neural networks and deep learning by building real-world AI applications.",
                        "icon" => "fas fa-brain",
                        "projects" => [
                            [
                                "name" => "Face Recognition System",
                                "description" => "Develop a deep learning-based facial recognition system for authentication.",
                                "tools" => ["Python", "OpenCV", "TensorFlow", "Keras"],
                                "steps" => [
                                    "Collecting and preprocessing facial images",
                                    "Training a CNN model for face detection",
                                    "Building a real-time face recognition system",
                                    "Deploying the model using Flask or FastAPI",
                                    "Testing with live webcam input"
                                ]
                            ],
                            [
                                "name" => "Medical Image Diagnosis (Pneumonia Detection)",
                                "description" => "Train a deep learning model to classify pneumonia from chest X-rays.",
                                "tools" => ["TensorFlow", "Keras", "PyTorch", "MATLAB"],
                                "steps" => [
                                    "Understanding medical imaging and dataset selection",
                                    "Training a CNN model for pneumonia classification",
                                    "Evaluating performance using confusion matrix",
                                    "Deploying as a web-based AI diagnosis tool",
                                    "Testing with real X-ray images"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Natural Language Processing (NLP) Bootcamp: AI-Powered Text Analysis",
                        "description" => "Learn NLP techniques to build text analysis and chatbot applications.",
                        "icon" => "fas fa-language",
                        "projects" => [
                            [
                                "name" => "Sentiment Analysis System",
                                "description" => "Develop an AI model to analyze sentiment in product reviews.",
                                "tools" => ["Python", "NLTK", "Hugging Face Transformers", "Flask"],
                                "steps" => [
                                    "Collecting and cleaning text data",
                                    "Training an NLP model for sentiment classification",
                                    "Deploying the model as an API",
                                    "Building a front-end to visualize sentiment analysis",
                                    "Testing with real customer reviews"
                                ]
                            ],
                            [
                                "name" => "AI Chatbot for Customer Support",
                                "description" => "Build a conversational AI chatbot for automated customer support.",
                                "tools" => ["Dialogflow", "Rasa", "GPT-3", "Node.js"],
                                "steps" => [
                                    "Understanding chatbot architecture and NLP techniques",
                                    "Developing intent recognition using Dialogflow/Rasa",
                                    "Integrating the chatbot with GPT-3 for advanced responses",
                                    "Deploying the chatbot on a website or messaging app",
                                    "Testing and improving conversation flow"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Reinforcement Learning Bootcamp: AI Agents & Game Development",
                        "description" => "Build AI agents that learn through reinforcement learning in simulated environments.",
                        "icon" => "fas fa-gamepad",
                        "projects" => [
                            [
                                "name" => "Self-Driving Car Simulation",
                                "description" => "Develop an AI model to navigate a virtual self-driving car using reinforcement learning.",
                                "tools" => ["Python", "OpenAI Gym", "TensorFlow", "Unity ML-Agents"],
                                "steps" => [
                                    "Understanding reinforcement learning and reward functions",
                                    "Training an AI agent using OpenAI Gym",
                                    "Simulating a self-driving car in Unity ML-Agents",
                                    "Evaluating performance and optimizing decision-making",
                                    "Deploying the trained model for real-time simulation"
                                ]
                            ],
                            [
                                "name" => "AI Game Player (Flappy Bird Bot)",
                                "description" => "Train an AI to play Flappy Bird using deep reinforcement learning.",
                                "tools" => ["Python", "TensorFlow", "Pygame"],
                                "steps" => [
                                    "Understanding reinforcement learning with Q-learning",
                                    "Building an AI agent that learns to play Flappy Bird",
                                    "Training using deep Q-networks (DQN)",
                                    "Visualizing training progress with TensorBoard",
                                    "Deploying and testing AI performance in-game"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "AI for Business Bootcamp: Data Science & Decision Making",
                        "description" => "Apply AI techniques to real-world business problems using data science.",
                        "icon" => "fas fa-briefcase",
                        "projects" => [
                            [
                                "name" => "Sales Forecasting System",
                                "description" => "Develop an AI model to predict future sales for retail businesses.",
                                "tools" => ["Python", "Scikit-Learn", "Time Series Analysis", "Tableau"],
                                "steps" => [
                                    "Collecting and analyzing historical sales data",
                                    "Applying time series forecasting techniques",
                                    "Building an ML model using Scikit-Learn",
                                    "Visualizing predictions with Tableau",
                                    "Deploying a sales forecasting dashboard"
                                ]
                            ],
                            [
                                "name" => "AI-Powered Resume Screening",
                                "description" => "Develop an AI system to analyze and rank job applications automatically.",
                                "tools" => ["Python", "NLTK", "TF-IDF", "FastAPI"],
                                "steps" => [
                                    "Extracting text data from resumes",
                                    "Using NLP to analyze skills and qualifications",
                                    "Building a ranking algorithm using TF-IDF",
                                    "Deploying as an API for HR teams",
                                    "Testing and evaluating AI recommendations"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
           
        //    Cybersecurity & Ethical Hacking Bootcamps
            [
                'name' => "Cybersecurity & Ethical Hacking",
                "icon" => "fas fa-user-secret",
                "bootcamps" => [
                    [
                        "title" => "Ethical Hacking Bootcamp: Penetration Testing & Security Audits",
                        "description" => "Learn ethical hacking methodologies by performing real penetration tests.",
                        "icon" => "fas fa-shield-alt",
                        "projects" => [
                            [
                                "name" => "Web Application Penetration Testing",
                                "description" => "Conduct penetration testing on web applications to identify security vulnerabilities.",
                                "tools" => ["Kali Linux", "Burp Suite", "OWASP ZAP", "Metasploit"],
                                "steps" => [
                                    "Setting up a testing environment using DVWA",
                                    "Performing SQL Injection and XSS attacks",
                                    "Using Burp Suite to intercept and modify requests",
                                    "Exploiting vulnerabilities with Metasploit",
                                    "Generating a penetration test report"
                                ]
                            ],
                            [
                                "name" => "Wireless Network Security Assessment",
                                "description" => "Analyze and secure wireless networks against attacks.",
                                "tools" => ["Aircrack-ng", "Wireshark", "Kali Linux"],
                                "steps" => [
                                    "Setting up a wireless security lab",
                                    "Capturing and analyzing network packets with Wireshark",
                                    "Cracking Wi-Fi passwords using Aircrack-ng",
                                    "Implementing WPA3 security enhancements",
                                    "Conducting a final network security audit"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Cyber Defense Bootcamp: Protect & Monitor IT Infrastructures",
                        "description" => "Learn how to implement security measures and monitor systems against cyber threats.",
                        "icon" => "fas fa-lock",
                        "projects" => [
                            [
                                "name" => "SIEM & Log Analysis System",
                                "description" => "Set up and use a Security Information and Event Management (SIEM) system for threat detection.",
                                "tools" => ["Splunk", "ELK Stack (Elasticsearch, Logstash, Kibana)", "Wireshark"],
                                "steps" => [
                                    "Installing and configuring Splunk or ELK Stack",
                                    "Ingesting and analyzing security logs",
                                    "Detecting anomalies and malicious activities",
                                    "Setting up real-time alerting and reporting",
                                    "Creating a security dashboard for monitoring"
                                ]
                            ],
                            [
                                "name" => "Intrusion Detection System (IDS)",
                                "description" => "Develop and deploy an IDS to detect and prevent cyber threats.",
                                "tools" => ["Snort", "Suricata", "Zeek", "Python"],
                                "steps" => [
                                    "Setting up Snort or Suricata on a network",
                                    "Configuring rules to detect potential attacks",
                                    "Testing the IDS with simulated threats",
                                    "Integrating with a SIEM for real-time monitoring",
                                    "Improving detection accuracy using machine learning"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Digital Forensics Bootcamp: Investigate Cyber Crimes",
                        "description" => "Learn forensic investigation techniques to analyze cyber threats and recover evidence.",
                        "icon" => "fas fa-fingerprint",
                        "projects" => [
                            [
                                "name" => "Disk & Memory Forensics",
                                "description" => "Analyze hard drives and RAM dumps to investigate cyber incidents.",
                                "tools" => ["Autopsy", "Volatility", "FTK Imager"],
                                "steps" => [
                                    "Acquiring and imaging disk and memory dumps",
                                    "Extracting deleted files and metadata",
                                    "Performing timeline analysis of events",
                                    "Identifying malware footprints",
                                    "Generating an investigative report"
                                ]
                            ],
                            [
                                "name" => "Email & Social Media Forensics",
                                "description" => "Investigate cyber crimes involving email phishing and social media attacks.",
                                "tools" => ["Maltego", "ExifTool", "Wireshark"],
                                "steps" => [
                                    "Extracting metadata from emails and attachments",
                                    "Analyzing phishing attack patterns",
                                    "Investigating social media footprints using OSINT tools",
                                    "Tracing IP addresses and geolocations",
                                    "Presenting forensic findings in a legal report"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Red Team vs. Blue Team Bootcamp: Offensive & Defensive Security",
                        "description" => "Learn how to execute and defend against cyber attacks through Red vs. Blue team exercises.",
                        "icon" => "fas fa-people-arrows",
                        "projects" => [
                            [
                                "name" => "Simulated Cyber Attack & Defense",
                                "description" => "Red Team performs attacks while Blue Team defends and mitigates threats.",
                                "tools" => ["Metasploit", "Wireshark", "Splunk", "Snort"],
                                "steps" => [
                                    "Red Team: Conducting an ethical hacking attack",
                                    "Blue Team: Monitoring and detecting suspicious activities",
                                    "Red Team: Bypassing security measures",
                                    "Blue Team: Implementing countermeasures",
                                    "Final debrief: Lessons learned and security improvements"
                                ]
                            ],
                            [
                                "name" => "Active Directory Security Assessment",
                                "description" => "Test and secure Active Directory environments from cyber attacks.",
                                "tools" => ["BloodHound", "PowerShell", "Mimikatz"],
                                "steps" => [
                                    "Enumerating Active Directory users and groups",
                                    "Identifying misconfigurations and privilege escalations",
                                    "Exploiting AD vulnerabilities using Mimikatz",
                                    "Implementing security hardening techniques",
                                    "Conducting a final security audit"
                                ]
                            ]
                        ]
                    ],
                    [
                        "title" => "Cloud Security Bootcamp: Secure Cloud Infrastructures",
                        "description" => "Learn to secure cloud environments and prevent cyber threats in cloud platforms.",
                        "icon" => "fas fa-cloud-shield-alt",
                        "projects" => [
                            [
                                "name" => "AWS Security Audit & Hardening",
                                "description" => "Assess and secure AWS cloud environments against cyber threats.",
                                "tools" => ["AWS Security Hub", "GuardDuty", "IAM", "Terraform"],
                                "steps" => [
                                    "Configuring IAM roles and least privilege access",
                                    "Setting up AWS CloudTrail for logging and monitoring",
                                    "Using AWS Security Hub for vulnerability assessments",
                                    "Implementing network security groups and firewalls",
                                    "Testing cloud security posture with penetration testing tools"
                                ]
                            ],
                            [
                                "name" => "Container & Kubernetes Security",
                                "description" => "Secure containerized applications and Kubernetes clusters.",
                                "tools" => ["Docker", "Kubernetes", "Falco", "Kube-bench"],
                                "steps" => [
                                    "Setting up a secure Kubernetes cluster",
                                    "Applying role-based access control (RBAC)",
                                    "Implementing network policies and service mesh security",
                                    "Scanning for vulnerabilities in Docker images",
                                    "Monitoring runtime security threats using Falco"
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
    }
}
