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
                    $newProgramme->bootcamps()->firstOrCreate([
                        'title'=>$bootcamp['title'],
                        'description'=>$bootcamp['description'],
                        'icon'=>$bootcamp['icon'],
                    ]);
                }
        }
    }

    public function getData()
    {
        return [
            [
                'name'=>"Web Development",
                "icon" => "fas fa-code",
                "bootcamps" => [
                    [
                        "title" => "Full-Stack Web Development Bootcamp: From Concept to Deployment",
                        "description" => "Learn to build, optimize, and deploy modern web applications using the latest technologies.",
                        "icon" => "fas fa-laptop-code"
                    ],
                    [
                        "title" => "Modern Web Application Bootcamp: Build Scalable & Secure Apps",
                        "description" => "Develop secure and scalable web apps with frontend and backend best practices.",
                        "icon" => "fas fa-server"
                    ],
                    [
                        "title" => "Frontend & Backend Mastery Bootcamp: React, Node.js & Databases",
                        "description" => "Master frontend with React and backend with Node.js and databases.",
                        "icon" => "fas fa-database"
                    ],
                    [
                        "title" => "Web Development Accelerator Bootcamp: Hands-On Coding & Projects",
                        "description" => "Accelerate your web development skills through intensive hands-on projects.",
                        "icon" => "fas fa-bolt"
                    ],
                    [
                        "title" => "Practical Web Engineering Bootcamp: Develop, Optimize & Deploy",
                        "description" => "Build high-performance web applications with modern engineering principles.",
                        "icon" => "fas fa-cogs"
                    ]
                ]
            ],
            [
                'name'=>"Data Science & Analytics",
                "icon" => "fas fa-chart-bar",
                "bootcamps" => [
                    [
                        "title" => "Data Science Bootcamp: Analyze, Visualize & Predict",
                        "description" => "Learn data analysis, visualization, and predictive modeling using Python and R.",
                        "icon" => "fas fa-chart-pie"
                    ],
                    [
                        "title" => "Big Data Analytics Bootcamp: Unlock Business Insights",
                        "description" => "Process and analyze large datasets to extract meaningful insights.",
                        "icon" => "fas fa-database"
                    ],
                    [
                        "title" => "Python for Data Science Bootcamp: Practical Data Engineering",
                        "description" => "Use Python for data manipulation, analysis, and machine learning applications.",
                        "icon" => "fas fa-python"
                    ],
                    [
                        "title" => "Machine Learning for Data Analysis Bootcamp: Hands-On Approach",
                        "description" => "Apply machine learning techniques to analyze and predict data trends.",
                        "icon" => "fas fa-brain"
                    ],
                    [
                        "title" => "Business Intelligence & Data Science Bootcamp: Data-Driven Decisions",
                        "description" => "Transform raw data into actionable business insights using BI tools.",
                        "icon" => "fas fa-lightbulb"
                    ]
                ]
            ],
            [
                'name'=>"Blockchain & Web3 Development",
                "icon" => "fas fa-coins",
                "bootcamps" => [
                    [
                        "title" => "Blockchain Development Bootcamp: Smart Contracts & DApps",
                        "description" => "Learn to build decentralized applications and smart contracts using Solidity.",
                        "icon" => "fas fa-link"
                    ],
                    [
                        "title" => "Ethereum & Solidity Bootcamp: Decentralized Application Development",
                        "description" => "Create secure and efficient smart contracts on the Ethereum blockchain.",
                        "icon" => "fas fa-ethereum"
                    ],
                    [
                        "title" => "Web3 & DeFi Bootcamp: Building the Future of Finance",
                        "description" => "Explore decentralized finance (DeFi) and build financial Web3 applications.",
                        "icon" => "fas fa-wallet"
                    ],
                    [
                        "title" => "Crypto & Blockchain Security Bootcamp: Securing Digital Assets",
                        "description" => "Master blockchain security to protect crypto assets from vulnerabilities.",
                        "icon" => "fas fa-shield-alt"
                    ],
                    [
                        "title" => "Decentralized Applications (DApps) Bootcamp: Web3 in Action",
                        "description" => "Develop scalable DApps and integrate blockchain technologies into applications.",
                        "icon" => "fas fa-cube"
                    ]
                ]
            ],
            [
                'name'=>"Cloud Computing & DevOps",
                "icon" => "fas fa-cloud",
                "bootcamps" => [
                    [
                        "title" => "Cloud & DevOps Engineering Bootcamp: Automate & Scale",
                        "description" => "Master cloud platforms and DevOps automation tools.",
                        "icon" => "fas fa-server"
                    ],
                    [
                        "title" => "AWS & Azure Cloud Mastery Bootcamp: Infrastructure & Deployment",
                        "description" => "Learn cloud infrastructure deployment using AWS and Azure.",
                        "icon" => "fas fa-cloud-upload-alt"
                    ],
                    [
                        "title" => "DevOps Essentials Bootcamp: CI/CD, Containers & Kubernetes",
                        "description" => "Gain expertise in continuous integration, deployment, and containerization.",
                        "icon" => "fas fa-sync"
                    ],
                    [
                        "title" => "Serverless & Cloud Computing Bootcamp: Scalable App Development",
                        "description" => "Build and deploy applications using serverless architecture.",
                        "icon" => "fas fa-cloud-meatball"
                    ],
                    [
                        "title" => "Cloud Security & DevOps Bootcamp: Build & Maintain Secure Systems",
                        "description" => "Secure cloud infrastructure while automating deployments.",
                        "icon" => "fas fa-user-shield"
                    ]
                ]
            ],
            
            [
                'name'=> "Artificial Intelligence & Machine Learning",
                "icon" => "fas fa-robot",
                "bootcamps" => [
                    [
                        "title" => "AI & Machine Learning Bootcamp: Building Smart Systems",
                        "description" => "Learn AI fundamentals and develop intelligent systems using Python and TensorFlow.",
                        "icon" => "fas fa-brain"
                    ],
                    [
                        "title" => "Deep Learning & AI Bootcamp: Neural Networks in Action",
                        "description" => "Master neural networks and deep learning techniques for AI applications.",
                        "icon" => "fas fa-network-wired"
                    ],
                    [
                        "title" => "Applied Machine Learning Bootcamp: Real-World AI Solutions",
                        "description" => "Work on real-world machine learning problems using supervised and unsupervised learning.",
                        "icon" => "fas fa-chart-line"
                    ],
                    [
                        "title" => "AI-Driven Development Bootcamp: Algorithms, Data & Intelligence",
                        "description" => "Learn AI-powered software development techniques and algorithm optimization.",
                        "icon" => "fas fa-microchip"
                    ],
                    [
                        "title" => "Machine Learning Project Bootcamp: From Data to Predictions",
                        "description" => "Turn raw data into actionable predictions with ML models.",
                        "icon" => "fas fa-database"
                    ]
                ]
            ],
            [
                'name'=>"Cybersecurity & Ethical Hacking",
                "icon" => "fas fa-shield-alt",
                "bootcamps" => [
                    [
                        "title" => "Ethical Hacking & Cybersecurity Bootcamp: Protect & Defend",
                        "description" => "Learn ethical hacking techniques to secure systems and networks.",
                        "icon" => "fas fa-user-secret"
                    ],
                    [
                        "title" => "Penetration Testing Bootcamp: Offensive & Defensive Security",
                        "description" => "Gain hands-on experience in penetration testing and vulnerability assessment.",
                        "icon" => "fas fa-bug"
                    ],
                    [
                        "title" => "Digital Forensics & Incident Response Bootcamp",
                        "description" => "Learn forensic investigation techniques to analyze cyber threats and respond to incidents.",
                        "icon" => "fas fa-fingerprint"
                    ],
                    [
                        "title" => "Cyber Threat Analysis Bootcamp: Secure Networks & Systems",
                        "description" => "Develop the skills to analyze and mitigate cyber threats in real-time.",
                        "icon" => "fas fa-lock"
                    ],
                    [
                        "title" => "Offensive Security Engineering Bootcamp: Ethical Hacking in Practice",
                        "description" => "Master offensive security strategies and ethical hacking methodologies.",
                        "icon" => "fas fa-user-shield"
                    ]
                ]
            ],
            ['name'=>"Mobile App Development",
                "icon" => "fas fa-mobile-alt",
                "bootcamps" => [
                    [
                        "title" => "Mobile App Development Bootcamp: Build & Deploy Stunning Apps",
                        "description" => "Learn mobile development using Flutter or React Native.",
                        "icon" => "fas fa-mobile"
                    ],
                    [
                        "title" => "Cross-Platform Mobile Development Bootcamp: React Native & Flutter",
                        "description" => "Develop apps that run seamlessly on both Android and iOS.",
                        "icon" => "fas fa-code-branch"
                    ],
                    [
                        "title" => "Practical Mobile Engineering Bootcamp: APIs, UI/UX & Databases",
                        "description" => "Learn to build mobile apps with rich user interfaces and API integrations.",
                        "icon" => "fas fa-palette"
                    ],
                    [
                        "title" => "Full-Stack Mobile App Bootcamp: Frontend, Backend & Cloud",
                        "description" => "Master mobile development along with backend services and cloud hosting.",
                        "icon" => "fas fa-cloud"
                    ],
                    [
                        "title" => "Advanced Mobile App Development Bootcamp: Performance & Security",
                        "description" => "Optimize app performance and implement security best practices.",
                        "icon" => "fas fa-shield-alt"
                    ]
                ]
            ]
        ];
    }
}
