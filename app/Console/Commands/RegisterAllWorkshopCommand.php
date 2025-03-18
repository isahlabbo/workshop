<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Programme;

class RegisterAllWorkshopCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'workshop:data-generate';

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
        foreach($this->getData() as $category){
            $workshopCategory = Programme::firstOrCreate(['name'=>$category['name'],'icon'=>$category['icon']]);
            foreach($category['workshops'] as $workshop){
                $newWorkshop = $workshopCategory->workshops()->firstOrCreate([
                    'title'=>$workshop['title'],
                    'icon'=>$workshop['icon'],
                    'description'=>$workshop['description']
                    ]);
                foreach($newWorkshop['topics'] as $topic){
                    $newTopic = $newWorkshop->topics()->firstOrCreate([
                        'title'=>$topic['title'],
                        'day'=>$topic['day']
                    ]);
                    foreach($newTopic['subTopics'] as $subTopic){
                        $newTopic->subTopics()->firstOrCreate(['title'=>$subTopic]);
                    }
                }
            }
        }
    }

    public function getData()
    {
        return [
            ['name'=>'Digital Literacy','icon'=>'fas fa-laptop-code','workshops'=>[
                        [
                            'title'=>'Digital Literacy Workshop',
                            'description'=>'This workshop aims to bridge the digital divide by providing participants with fundamental digital skills. Topics covered include basic computer operations, internet navigation, and the use of essential software applications like Microsoft Office.',
                            'icon'=>'fas fa-laptop-code',
                            'topics'=>[
                                // day 1 topic and subtopics
                                [
                                    'title'=>'Introduction to Digital Literacy',
                                    'day' => 1,
                                    'subTopics'=>[
                                        'Overview of digital literacy',
                                        'Importance of digital skills in the workplace',
                                        'Basic computer operation: hardware and software'
                                    ]
                                ],
                                // day 2 topic and subtopics
                                [
                                    'title'=>'Internet Navigation and Communication',
                                    'day' => 2,
                                    'subTopics'=>[
                                        'Introduction to web browsers',
                                        'Navigating websites and using search engines effectively',
                                        'Understanding email basics and creating an email account'
                                    ]
                                ],
                                // day 3 topic and subtopics
                                [
                                    'title'=>'File Management and Basic Software Usage',
                                    'day' => 3,
                                    'subTopics'=>[
                                        'Organizing files and folders on the computer',
                                        'Introduction to office software (e.g., Microsoft Word)',
                                        'Creating, editing, and saving documents'
                                    ]
                                ],
                                // day 4 topic and subtopics
                                [
                                    'title'=>'Online Safety and Security',
                                    'day' => 4,
                                    'subTopics'=>[
                                        'Understanding online threats (e.g., phishing, malware)',
                                        'Best practices for online safety',
                                        'Password management and data protection'
                                    ]
                                ],
                                // day 5 topic and subtopics
                                [
                                    'title'=>'Practical Application and Q&A',
                                    'day' => 5,
                                    'subTopics'=>[
                                        'Hands-on exercises for applying digital literacy skills',
                                        'Troubleshooting common issues',
                                        'Question and answer session'
                                    ]
                                ],
                            ]
                        ],
                        [
                            'title'=>'Microsoft Word for Document Automation Workshop',
                            'description'=>'Participants will learn how to automate repetitive tasks in Microsoft Word, such as mail merging, template creation, and macros. This workshop aims to streamline document management and increase productivity.',
                            'icon'=>'fas fa-file-word',
                            
                        ],
                        [
                            'title'=>'Effective PowerPoint Presentation Skills Workshop',
                            'description'=>'This workshop focuses on creating impactful presentations using Microsoft PowerPoint. Participants will learn design principles, advanced features, and effective delivery techniques to engage audiences and communicate ideas effectively.',
                            'icon'=>'fas fa-file-powerpoint',
                        ],
                        [
                            'title'=>'Basic Computer Skills for Beginners',
                            'description'=>'This course covers the basics of using a computer, including understanding the operating system, file management, and basic troubleshooting. It is designed for individuals with little to no prior computer experience.',
                            'icon'=>'fas fa-desktop',
                        ],
                    ]
                ],
            ['name'=>'Cybersecurity','icon'=>'fas fa-shield-alt','workshops'=>[
                        [
                            'title'=>'Cyber Security Training Workshop',
                            'description'=>'This workshop provides an overview of cybersecurity principles, including threat identification, risk management, and defense strategies. Participants will learn to protect their digital assets and respond to security incidents.',
                            'icon'=>'fas fa-shield-alt',
                        ],
                        [
                            'title'=>'Cybersecurity Awareness and Best Practices Workshop',
                            'description'=>'Participants will gain an understanding of common cyber threats and best practices for protecting personal and organizational data. The workshop covers topics like password management, phishing prevention, and safe online behavior.',
                            'icon'=>'fas fa-user-shield',

                        ],
                        [
                            'title'=>'Network Security Fundamentals Workshop',
                            'description'=>'This course covers the basics of securing computer networks, including network security protocols, firewalls, and intrusion detection systems. Participants will learn to protect network infrastructure from various cyber threats.',
                            'icon'=>'fas fa-network-wired',
                        ],
                    ]
                ],
            ['name'=>'Data Management','icon'=>'fas fa-database','workshops'=>[
                        [
                            'title'=>'Data Management and Analysis Workshop',
                            'description'=>'Participants will learn the principles of data management, including data collection, organization, and analysis. The workshop covers various tools and techniques for handling data efficiently, enabling informed decision-making based on accurate data insights.',
                            'icon'=>'fas fa-database',
                        ],
                        [
                            'title'=>'Advanced Excel for Data Analysis Workshop',
                            'description'=>'This workshop delves into advanced Excel features for data analysis, including pivot tables, advanced formulas, and data visualization techniques. Participants will learn how to leverage these tools to analyze large datasets and derive meaningful insights.',
                            'icon'=>'fas fa-chart-bar',
                        ],
                        [
                            'title'=>'Microsoft Access for Database Management Workshop',
                            'description'=>'Participants will learn how to use Microsoft Access to create and manage databases, streamline data entry, and generate reports. The workshop aims to improve data management and accessibility.',
                            'icon'=>'fas fa-table',
                        ],
                        [
                            'title'=>'SQL for Database Querying Workshop',
                            'description'=>'Participants will learn SQL (Structured Query Language) for querying and managing databases. The workshop covers writing SQL queries, database manipulation, and data retrieval, enabling efficient data management and analysis.',
                            'icon'=>'fas fa-database',
                        ],
                        [
                            'title'=>'Data Visualization Techniques Workshop',
                            'description'=>'This course covers various tools and methods for visualizing data, including charts, graphs, and dashboards using tools like Tableau and Power BI. Participants will learn how to present data in a clear and visually appealing manner.',
                            'icon'=>'fas fa-chart-pie',
                        ],
                    ]
                ],
            ['name'=>'Programming & Automation','icon'=>'fas fa-code','workshops'=>[
                        [
                            'title'=>'Excel VBA (Macro) Programming Workshop',
                            'description'=>'This workshop teaches participants how to use Visual Basic for Applications (VBA) to automate tasks in Excel. It covers writing macros, creating custom functions, and automating data processing, enhancing productivity and enabling complex data manipulations.',
                            'icon'=>'fas fa-code',
                        ],
                        [
                            'title'=>'Introduction to Python Programming Workshop',
                            'description'=>'This course provides an introduction to Python programming, focusing on basic syntax, data structures, and simple automation scripts. Participants will learn how to write and execute Python programs to solve real-world problems.',
                            'icon'=>'fas fa-python',
                        ],
                        [
                            'title'=>'Web Design Fundamentals Workshop',
                            'description'=>'This course covers the basics of web design, including HTML, CSS, and JavaScript. Participants will learn to create and style web pages, making them interactive and responsive. The workshop is designed for beginners looking to start their journey in web development.',
                            'icon'=>'fas fa-laptop-code',
                        ],
                    ]
                ],
            ['name'=>'Communication Skills','icon'=>'fas fa-comments','workshops'=>[
                        [
                            'title'=>'Digital Communication Skills Workshop',
                            'description'=>'This workshop focuses on enhancing digital communication skills, including email etiquette, professional social media use, and effective online collaboration. Participants will learn best practices for communicating effectively in a digital environment.',
                            'icon'=>'fas fa-comments',
                        ],
                        [
                            'title'=>'Email Etiquette and Professional Writing Workshop',
                            'description'=>'This course focuses on writing professional emails and other business communications, emphasizing clarity, tone, and style. Participants will learn how to craft clear, concise, and effective messages for various professional contexts.',
                            'icon'=>'fas fa-envelope',
                        ],
                        [
                            'title'=>'Social Media for Professional Development Workshop',
                            'description'=>'This course teaches participants how to leverage social media platforms for networking, professional development, and personal branding. Participants will learn strategies for creating a positive online presence and engaging with professional communities.',
                            'icon'=>'fas fa-share-alt',
                        ],
                    ]
                ],
        ];

    }
}
