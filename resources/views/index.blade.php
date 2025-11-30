<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Life of Pi - Literary Analysis</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Georgia', serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header and Navigation */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
        }

        nav {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            font-size: 2em;
            font-weight: bold;
            color: #764ba2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        .nav-links {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .nav-btn {
            padding: 12px 24px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .nav-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .nav-btn.active {
            background: linear-gradient(45deg, #764ba2, #667eea);
            transform: scale(1.05);
        }

        /* Content Sections */
        .content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            display: none;
        }

        .content.active {
            display: block;
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1, h2, h3 {
            color: #764ba2;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2.5em;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }

        h2 {
            font-size: 2em;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
            margin-top: 30px;
        }

        h3 {
            font-size: 1.5em;
            margin-top: 25px;
        }

        p {
            margin-bottom: 15px;
            text-align: justify;
        }

        .timeline-item {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
            margin: 15px 0;
            border-radius: 10px;
            border-left: 5px solid #667eea;
        }

        .timeline-year {
            font-weight: bold;
            color: #764ba2;
            font-size: 1.2em;
        }

        /* Quiz Styles */
        .quiz-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .difficulty-selector {
            text-align: center;
            margin-bottom: 30px;
        }

        .difficulty-btn {
            padding: 15px 30px;
            margin: 10px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .easy { background: linear-gradient(45deg, #4CAF50, #45a049); color: white; }
        .medium { background: linear-gradient(45deg, #FF9800, #F57C00); color: white; }
        .hard { background: linear-gradient(45deg, #F44336, #D32F2F); color: white; }

        .difficulty-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .quiz-stats {
            display: flex;
            justify-content: space-between;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 2em;
            font-weight: bold;
            color: #764ba2;
        }

        .question-container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .question-text {
            font-size: 1.3em;
            margin-bottom: 25px;
            color: #333;
        }

        .option {
            display: block;
            width: 100%;
            padding: 15px 20px;
            margin: 10px 0;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        .option:hover {
            border-color: #667eea;
            background: #f8f9ff;
            transform: translateX(5px);
        }

        .option.selected {
            border-color: #764ba2;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .option.correct {
            border-color: #4CAF50;
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
        }

        .option.incorrect {
            border-color: #F44336;
            background: linear-gradient(135deg, #F44336, #D32F2F);
            color: white;
        }

        .quiz-controls {
            text-align: center;
            margin-top: 20px;
        }

        .quiz-btn {
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .quiz-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        .quiz-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .results-container {
            text-align: center;
            padding: 40px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 15px;
        }

        .final-score {
            font-size: 3em;
            font-weight: bold;
            color: #764ba2;
            margin: 20px 0;
        }

        .username-input {
            padding: 15px;
            border: 2px solid #667eea;
            border-radius: 10px;
            font-size: 18px;
            margin: 20px;
            width: 300px;
            text-align: center;
        }

        .leaderboard {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }

        .leaderboard-entry {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }

        .leaderboard-entry:nth-child(odd) {
            background: #f9f9f9;
        }

        @media (max-width: 768px) {
            .nav-links {
                justify-content: center;
                width: 100%;
                margin-top: 15px;
            }
            
            .quiz-stats {
                flex-direction: column;
                gap: 15px;
            }
            
            .username-input {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">Life of Pi</div>
                <div class="nav-links">
                    <button class="nav-btn active" onclick="showSection('home')">Home</button>
                    <button class="nav-btn" onclick="showSection('timeline')">Historical Timeline</button>
                    <button class="nav-btn" onclick="showSection('conventions')">Literary Conventions</button>
                    <button class="nav-btn" onclick="showSection('biography')">Author's Biography</button>
                    <button class="nav-btn" onclick="showSection('summary')">Work Summary</button>
                    <button class="nav-btn" onclick="showSection('analysis')">Literary Analysis</button>
                    <button class="nav-btn" onclick="showSection('quiz')">Quiz</button>
                </div>
            </nav>
        </header>

        <!-- Home Section -->
        <div id="home" class="content active">
            <h1>Life of Pi: A Literary Journey</h1>
            <p>Welcome to our comprehensive analysis of "Life of Pi" by Yann Martel. This interactive website explores one of the most captivating survival stories in modern literature, examining its themes, symbolism, and the extraordinary journey of Pi Patel.</p>
            
            <h2>About This Project</h2>
            <p>Published in 2001, "Life of Pi" has become a modern classic that challenges readers to consider the nature of truth, faith, and survival. Through Pi's incredible 227-day journey on the Pacific Ocean with a Bengal tiger named Richard Parker, Martel crafts a tale that is both adventure story and philosophical meditation.</p>
            
            <h2>Navigate Through Our Analysis</h2>
            <p>Use the navigation menu above to explore different aspects of this remarkable novel:</p>
            <ul style="margin-left: 30px; margin-top: 15px;">
                <li><strong>Historical Timeline:</strong> Key events surrounding the novel's creation and publication</li>
                <li><strong>Literary Conventions:</strong> The philosophical and narrative techniques employed</li>
                <li><strong>Author's Biography:</strong> Learn about Yann Martel's life and influences</li>
                <li><strong>Work Summary:</strong> A comprehensive overview of the plot and structure</li>
                <li><strong>Literary Analysis:</strong> Deep dive into themes, symbols, and literary significance</li>
                <li><strong>Quiz:</strong> Test your knowledge with our interactive quiz!</li>
            </ul>
        </div>

        <!-- Historical Timeline Section -->
        <div id="timeline" class="content">
            <h1>Historical Timeline</h1>
            
            <div class="timeline-item">
                <div class="timeline-year">1963</div>
                <p><strong>Yann Martel is born</strong> in Salamanca, Spain, to Canadian parents. His multicultural upbringing would later influence his worldview and writing.</p>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">1980s-1990s</div>
                <p><strong>Martel's formative years as a writer</strong> - He publishes short stories and works various jobs while developing his craft. His travels expose him to different cultures and philosophies.</p>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">1996</div>
                <p><strong>Publication of "Self"</strong> - Martel's first novel, exploring themes of identity and gender, receives critical acclaim but limited commercial success.</p>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">1998-2000</div>
                <p><strong>Research and Writing of Life of Pi</strong> - Martel spends time in India researching religions and animal behavior. He visits zoos and interviews zookeepers to understand animal psychology.</p>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">September 2001</div>
                <p><strong>Life of Pi is published</strong> by Knopf Canada. The novel immediately gains attention for its unique premise and philosophical depth.</p>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">2002</div>
                <p><strong>Man Booker Prize Victory</strong> - Life of Pi wins the prestigious Man Booker Prize, catapulting Martel to international fame and the novel to bestseller status.</p>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">2003-2010</div>
                <p><strong>Global Recognition</strong> - The novel is translated into dozens of languages and wins numerous international awards. It becomes required reading in many educational institutions.</p>
            </div>

            <div class="timeline-item">
                <div class="timeline-year">2012</div>
                <p><strong>Film Adaptation</strong> - Ang Lee's film adaptation is released, winning four Academy Awards including Best Director, introducing the story to a new generation.</p>
            </div>
        </div>

        <!-- Literary Conventions Section -->
        <div id="conventions" class="content">
            <h1>Literary Conventions & Schools of Thought</h1>

            <h2>Magical Realism</h2>
            <p>Life of Pi exemplifies magical realism, a literary movement that presents fantastical events within a realistic narrative framework. The novel's blend of the extraordinary (a boy surviving 227 days at sea with a tiger) with meticulously researched details about maritime survival and animal behavior creates the hallmark tension of magical realist works.</p>

            <h2>Postcolonial Literature</h2>
            <p>As a work by a Canadian author featuring an Indian protagonist, the novel engages with postcolonial themes. Pi's journey from India to Canada mirrors the immigrant experience, while his multicultural identity reflects the complexity of postcolonial subjectivity. The novel challenges Western perspectives through Pi's unique blend of Hindu, Christian, and Islamic beliefs.</p>

            <h2>Philosophical Fiction</h2>
            <p>The novel operates within the tradition of philosophical fiction, using narrative to explore fundamental questions about existence, faith, and truth. Like works by Camus or Sartre, it presents philosophical dilemmas through concrete situations, allowing readers to grapple with abstract concepts through Pi's experiences.</p>

            <h2>Survival Literature</h2>
            <p>Life of Pi belongs to the survival narrative tradition, alongside classics like "Robinson Crusoe" and "The Old Man and the Sea." However, Martel subverts the genre by making survival dependent not just on physical resourcefulness but on storytelling and imagination.</p>

            <h2>Frame Narrative Structure</h2>
            <p>The novel employs a frame narrative, with an unnamed narrator presenting Pi's story. This technique, used in works like "Heart of Darkness," creates layers of storytelling that question the nature of truth and reliability in narrative.</p>

            <h2>Religious Allegory</h2>
            <p>The work functions as a modern religious allegory, with Pi's journey representing a spiritual odyssey. The lifeboat becomes a microcosm of the world, and Richard Parker embodies the wild, untameable aspects of existence that must be faced and understood.</p>
        </div>

        <!-- Author Biography Section -->
        <div id="biography" class="content">
            <h1>Yann Martel: Author Biography</h1>

            <h2>Early Life and Background</h2>
            <p>Yann Martel was born on June 25, 1963, in Salamanca, Spain, to Canadian parents. His father, Émile Martel, was a diplomat and poet, while his mother was a translator. This international upbringing exposed young Martel to diverse cultures and languages from an early age, profoundly shaping his worldview and later influencing his writing.</p>

            <p>The family moved frequently during Martel's childhood, living in Costa Rica, France, Mexico, and Canada. This nomadic lifestyle gave him a unique perspective on cultural identity and belonging, themes that would later permeate his literary works, particularly in "Life of Pi."</p>

            <h2>Education and Early Career</h2>
            <p>Martel studied philosophy at Trent University in Ontario, Canada, where he developed his interest in existential questions and comparative religion. After graduating, he worked various jobs including tree planter, dishwasher, and security guard while pursuing his writing career.</p>

            <p>His early works included a collection of short stories and his first novel "Self" (1996), which explored themes of gender identity and self-discovery. While critically acclaimed, these works had limited commercial success, leaving Martel relatively unknown in the literary world.</p>

            <h2>The Genesis of Life of Pi</h2>
            <p>The inspiration for "Life of Pi" came from a 1981 book review Martel read about a Brazilian author's novel featuring a man and a panther sharing a boat. The review noted that the premise had "zoological verisimilitude" but the story lacked life. Martel was intrigued by the concept and began developing his own version.</p>

            <p>To research the novel, Martel traveled to India, where he spent months studying Hinduism, visiting temples, and observing religious practices. He also conducted extensive research on animal behavior, maritime survival, and zoo management, even spending time with zookeepers to understand animal psychology.</p>

            <h2>Literary Success and Recognition</h2>
            <p>The publication of "Life of Pi" in 2001 transformed Martel from a struggling writer into an internationally recognized author. The novel's win of the 2002 Man Booker Prize brought him worldwide fame and established him as a major voice in contemporary literature.</p>

            <p>Following this success, Martel has continued to write, publishing "Beatrice and Virgil" (2010) and "The High Mountains of Portugal" (2016), among other works. He has also been involved in literary activism, notably sending books to Canadian Prime Minister Stephen Harper as part of his "What Is Stephen Harper Reading?" project.</p>

            <h2>Writing Philosophy and Influences</h2>
            <p>Martel's writing is characterized by its exploration of faith, storytelling, and the human condition. He has cited authors like Jorge Luis Borges, Alice Munro, and Milan Kundera as influences. His work often blends realism with fantastical elements, challenging readers to question the nature of truth and reality.</p>

            <p>He believes in the power of stories to make sense of existence, a theme central to "Life of Pi." Martel has stated that he sees himself as a "religious writer" in the sense that his works explore spiritual and existential questions, though not necessarily from a traditional religious perspective.</p>
        </div>

        <!-- Summary Section -->
        <div id="summary" class="content">
            <h1>Summary of Life of Pi</h1>

            <h2>Structure and Narrative Framework</h2>
            <p>The novel is divided into three parts, framed by an Author's Note that presents the story as a true account discovered by the narrator during a trip to India. This frame narrative technique immediately establishes questions about truth and fiction that permeate the entire work.</p>

            <h2>Part One: The Foundation (Chapters 1-36)</h2>
            <p>The story begins in Pondicherry, India, where sixteen-year-old Piscine "Pi" Patel lives with his family. His father owns a zoo, giving Pi extensive knowledge of animal behavior and psychology. Pi's character is established as intellectually curious and spiritually open - he simultaneously practices Hinduism, Christianity, and Islam, much to his parents' bewilderment.</p>

            <p>The family decides to emigrate to Canada due to political instability in India. They plan to transport their zoo animals to North America to sell them, booking passage on a Japanese cargo ship, the Tsimtsum. Pi's multicultural religious beliefs and his deep connection to animals are established as central to his character.</p>

            <h2>Part Two: The Ocean Journey (Chapters 37-94)</h2>
            <p>This section comprises the bulk of the narrative and details Pi's extraordinary survival story. The Tsimtsum sinks in a storm in the Pacific Ocean, and Pi finds himself the sole human survivor on a lifeboat. Initially, he shares the boat with several animals: a zebra, a hyena, an orangutan named Orange Juice, and a 450-pound Bengal tiger named Richard Parker.</p>

            <p>The natural order of predator and prey quickly asserts itself. The hyena kills the wounded zebra and Orange Juice, but is then killed by Richard Parker, who emerges from his hiding place beneath the boat's tarpaulin. Pi realizes he must coexist with this dangerous predator to survive.</p>

            <p>What follows is an extraordinary 227-day journey across the Pacific Ocean. Pi demonstrates remarkable resourcefulness, using his knowledge of animal behavior to establish a relationship with Richard Parker based on respect rather than friendship. He creates a training regimen, maintains boundaries, and ensures both their survival through careful rationing of supplies and ingenious methods of catching food and collecting rainwater.</p>

            <p>Throughout their journey, Pi faces numerous challenges: starvation, dehydration, storms, sharks, and the constant threat posed by Richard Parker. His survival depends not only on physical resourcefulness but also on his mental strength, sustained by his faith and his determination to live.</p>

            <p>The lifeboat eventually reaches a mysterious carnivorous island populated by meerkats. While this provides temporary respite and sustenance, Pi discovers the island's sinister nature and realizes they must continue their journey. Finally, they reach the coast of Mexico, where Richard Parker disappears into the jungle without acknowledgment, leaving Pi devastated by this anticlimatic farewell.</p>

            <h2>Part Three: The Alternative Story (Chapters 95-100)</h2>
            <p>In this brief but crucial final section, Pi is interviewed by Japanese maritime officials investigating the sinking of the Tsimtsum. When they express skepticism about his story involving the tiger, Pi provides an alternative version: instead of animals, the lifeboat contained a French cook (the hyena), Pi's mother (Orange Juice), a wounded sailor (the zebra), and Pi himself (Richard Parker).</p>

            <p>In this darker version, the cook kills and cannibalizes the sailor and Pi's mother before Pi kills the cook in revenge. This alternative story suggests that the animal version may have been Pi's way of processing traumatic events too horrible to confront directly.</p>

            <p>The officials prefer the story with the tiger, and Pi asks the narrator (and readers) which story they prefer, concluding with the famous line: "And so it goes with God." This ending challenges readers to consider the role of faith and storytelling in making sense of existence.</p>

            <h2>Themes and Significance</h2>
            <p>The novel operates on multiple levels: as an adventure story, a philosophical meditation on faith and survival, and an exploration of the power of storytelling. It raises profound questions about the nature of truth, the role of faith in human existence, and the stories we tell ourselves to make sense of life's hardships.</p>

            <p>Pi's survival story becomes a metaphor for the human condition itself - the struggle to maintain hope and meaning in the face of seemingly insurmountable challenges. The ambiguity of the ending forces readers to confront their own beliefs about truth, faith, and the stories we choose to believe.</p>
        </div>

        <!-- Literary Analysis Section -->
        <div id="analysis" class="content">
            <h1>Literary Analysis</h1>

            <h2>Major Themes</h2>
            
            <h3>The Nature of Truth and Storytelling</h3>
            <p>Central to "Life of Pi" is the question of truth in storytelling. The novel's dual narratives - the fantastical story with animals and the brutal realistic account - force readers to confront the relationship between fact and fiction. Martel suggests that the "truth" of a story may be less important than its meaning and the comfort it provides. Pi's question "which story do you prefer?" becomes a meditation on how we choose to understand our world.</p>

            <h3>Faith and Religion</h3>
            <p>Pi's simultaneous practice of Hinduism, Christianity, and Islam represents an inclusive approach to spirituality that transcends traditional religious boundaries. His faith sustains him through his ordeal, suggesting that belief itself - rather than specific doctrines - provides meaning and hope. The novel argues for faith as a choice that makes life bearable, regardless of its objective truth.</p>

            <h3>Survival and the Will to Live</h3>
            <p>The physical survival story operates as an allegory for psychological and spiritual survival. Pi's relationship with Richard Parker represents the need to coexist with the wild, dangerous aspects of existence. His survival depends on his ability to adapt, maintain discipline, and never give up hope, even in the face of seemingly impossible circumstances.</p>

            <h3>The Relationship Between Civilization and Wildness</h3>
            <p>Richard Parker embodies the wild, untamed aspects of nature that civilization attempts to control but never fully eliminates. Pi's zoo background gives him unique insight into this relationship, and his survival depends on respecting rather than trying to dominate the wildness represented by the tiger.</p>

            <h2>Symbolism and Metaphors</h2>

            <h3>Richard Parker as Symbol</h3>
            <p>The Bengal tiger functions on multiple symbolic levels: he represents Pi's own survival instincts, the dangerous aspects of existence that must be acknowledged and respected, and possibly Pi's own capacity for violence and survival at any cost. The tiger's name, inherited from a hunter, also symbolizes the colonial legacy and the complexity of identity.</p>

            <h3>The Lifeboat as Microcosm</h3>
            <p>The lifeboat becomes a compressed version of the world, where natural laws of survival operate without the mediation of civilization. It's a space where Pi must establish new rules and relationships, creating order from chaos.</p>

            <h3>The Carnivorous Island</h3>
            <p>The mysterious island that appears to offer salvation but reveals itself to be deadly represents false paradises and the dangers of complacency. It may also symbolize death itself - beautiful and peaceful on the surface but ultimately destructive.</p>

            <h3>Water as Life and Death</h3>
            <p>The ocean serves as both the source of Pi's trials and his salvation. Water represents the unconscious, the unknown, and the fundamental forces of existence that humans must navigate to survive.</p>

            <h2>Literary Techniques and Style</h2>

            <h3>Frame Narrative</h3>
            <p>The author's note and the narrator's presentation of Pi's story create layers of mediation that question the reliability of any narrative. This technique emphasizes the constructed nature of storytelling and invites readers to become active participants in determining meaning.</p>

            <h3>Magical Realism</h3>
            <p>Martel blends fantastical elements with meticulously researched realistic details, creating a narrative that exists in the space between fact and fiction. This technique allows the novel to explore philosophical and spiritual themes while maintaining narrative engagement.</p>

            <h3>Bildungsroman Elements</h3>
            <p>Pi's journey represents a coming-of-age story compressed into an extreme situation. His physical survival parallels his psychological and spiritual development, transforming him from a sheltered teenager into someone who has confronted the deepest questions of existence.</p>

            <h2>Cultural and Philosophical Context</h2>
            
            <h3>Postcolonial Perspectives</h3>
            <p>The novel presents a non-Western protagonist whose worldview challenges European-American literary traditions. Pi's multicultural identity and his family's migration from India to Canada reflect contemporary issues of globalization and cultural identity.</p>

            <h3>Environmental Themes</h3>
            <p>Pi's zoo background and his intimate relationship with animals reflect contemporary concerns about humanity's relationship with nature. The novel suggests that understanding and respecting the natural world is essential for human survival.</p>

            <h2>Literary Significance and Impact</h2>
            <p>"Life of Pi" has been recognized as a significant contribution to contemporary literature for its innovative exploration of faith, truth, and survival. Its blend of adventure narrative with philosophical depth has made it accessible to a wide audience while maintaining literary merit. The novel's influence extends beyond literature, inspiring discussions about spirituality, multiculturalism, and the power of storytelling in human experience.</p>

            <p>The work's success has also highlighted the growing importance of international voices in English-language literature and has contributed to discussions about magical realism's role in contemporary fiction. Its adaptation into a successful film has further expanded its cultural impact, introducing these themes to new audiences worldwide.</p>
        </div>

        <!-- Quiz Section -->
        <div id="quiz" class="content">
            <div class="quiz-container">
                <h1>Life of Pi Knowledge Quiz</h1>
                
                <!-- Difficulty Selection -->
                <div id="difficulty-selection" class="difficulty-selector">
                    <h2>Choose Your Difficulty Level</h2>
                    <button class="difficulty-btn easy" onclick="startQuiz('easy')">Easy Mode</button>
                    <button class="difficulty-btn medium" onclick="startQuiz('medium')">Medium Mode</button>
                    <button class="difficulty-btn hard" onclick="startQuiz('hard')">Hard Mode</button>
                </div>

                <!-- Quiz Interface -->
                <div id="quiz-interface" style="display: none;">
                    <div class="quiz-stats">
                        <div class="stat-item">
                            <div class="stat-value" id="current-question">1</div>
                            <div>Question</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value" id="current-score">0</div>
                            <div>Score</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value" id="time-left">30</div>
                            <div>Time</div>
                        </div>
                    </div>

                    <div class="question-container">
                        <div class="question-text" id="question-text"></div>
                        <div id="options-container"></div>
                    </div>

                    <div class="quiz-controls">
                        <button class="quiz-btn" id="submit-answer" onclick="submitAnswer()" disabled>Submit Answer</button>
                        <button class="quiz-btn" id="next-question" onclick="nextQuestion()" style="display: none;">Next Question</button>
                    </div>
                </div>

                <!-- Results Interface -->
                <div id="quiz-results" style="display: none;">
                    <div class="results-container">
                        <h2>Quiz Complete!</h2>
                        <div class="final-score" id="final-score">0</div>
                        <p id="performance-message"></p>
                        
                        <div style="margin-top: 30px;">
                            <input type="text" id="username" class="username-input" placeholder="Enter your username" maxlength="50">
                            <br>
                            <button class="quiz-btn" onclick="saveScore()">Save Score</button>
                            <button class="quiz-btn" onclick="restartQuiz()">Play Again</button>
                        </div>
                    </div>

                    <div class="leaderboard" id="leaderboard" style="display: none;">
                        <h3>Leaderboard</h3>
                        <div id="leaderboard-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navigation functionality
        function showSection(sectionId) {
            // Hide all content sections
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all nav buttons
            const navBtns = document.querySelectorAll('.nav-btn');
            navBtns.forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected section and highlight nav button
            document.getElementById(sectionId).classList.add('active');
            event.target.classList.add('active');
        }

        // Quiz System
        let currentQuiz = {
            questions: [],
            currentIndex: 0,
            score: 0,
            totalQuestions: 0,
            difficulty: '',
            timeLeft: 30,
            timer: null,
            startTime: null,
            responses: []
        };

        // Quiz questions database
        const quizQuestions = {
            easy: [
                {
                    id: 1,
                    question: "What is the name of the main character in Life of Pi?",
                    options: ["A) Piscine Patel", "B) Pierre Patel", "C) Paul Patel", "D) Patrick Patel"],
                    correct: "A",
                    points: 10
                },
                {
                    id: 2,
                    question: "What animal does Pi share the lifeboat with for most of his journey?",
                    options: ["A) A lion", "B) A Bengal tiger", "C) A leopard", "D) A panther"],
                    correct: "B",
                    points: 10
                },
                {
                    id: 3,
                    question: "What is the name of the tiger in the story?",
                    options: ["A) Richard Parker", "B) Robert Parker", "C) Roger Parker", "D) Raymond Parker"],
                    correct: "A",
                    points: 10
                },
                {
                    id: 4,
                    question: "In which country does Pi's family live before emigrating?",
                    options: ["A) Pakistan", "B) Bangladesh", "C) India", "D) Sri Lanka"],
                    correct: "C",
                    points: 10
                },
                {
                    id: 5,
                    question: "How many days does Pi survive at sea?",
                    options: ["A) 200 days", "B) 227 days", "C) 250 days", "D) 300 days"],
                    correct: "B",
                    points: 10
                },
                {
                    id: 6,
                    question: "What prize did Life of Pi win in 2002?",
                    options: ["A) Pulitzer Prize", "B) Nobel Prize", "C) Man Booker Prize", "D) Hugo Award"],
                    correct: "C",
                    points: 10
                },
                {
                    id: 7,
                    question: "What is Pi's father's profession?",
                    options: ["A) Teacher", "B) Zoo owner", "C) Doctor", "D) Businessman"],
                    correct: "B",
                    points: 10
                },
                {
                    id: 8,
                    question: "To which country is Pi's family emigrating?",
                    options: ["A) United States", "B) Australia", "C) Canada", "D) United Kingdom"],
                    correct: "C",
                    points: 10
                }
            ],
            medium: [
                {
                    id: 9,
                    question: "Which three religions does Pi practice simultaneously?",
                    options: ["A) Christianity, Buddhism, Islam", "B) Hinduism, Christianity, Islam", "C) Judaism, Christianity, Hinduism", "D) Buddhism, Hinduism, Sikhism"],
                    correct: "B",
                    points: 15
                },
                {
                    id: 10,
                    question: "What is the name of the ship that sinks?",
                    options: ["A) Titanic", "B) Poseidon", "C) Tsimtsum", "D) Yamato"],
                    correct: "C",
                    points: 15
                },
                {
                    id: 11,
                    question: "What carnivorous island do Pi and Richard Parker encounter?",
                    options: ["A) An island of acidic trees", "B) An island of carnivorous plants", "C) An island that becomes acidic at night", "D) An island of poisonous meerkats"],
                    correct: "C",
                    points: 15
                },
                {
                    id: 12,
                    question: "In the alternative story Pi tells the investigators, who does the hyena represent?",
                    options: ["A) The cook", "B) Pi's mother", "C) Pi himself", "D) The sailor"],
                    correct: "A",
                    points: 15
                },
                {
                    id: 13,
                    question: "What does Pi use to train Richard Parker?",
                    options: ["A) Food rewards only", "B) A whistle and turtle shield", "C) Loud noises", "D) Fresh water"],
                    correct: "B",
                    points: 15
                },
                {
                    id: 14,
                    question: "Which ocean does Pi's survival journey take place in?",
                    options: ["A) Atlantic Ocean", "B) Indian Ocean", "C) Pacific Ocean", "D) Arctic Ocean"],
                    correct: "C",
                    points: 15
                },
                {
                    id: 15,
                    question: "What is Pi's full name?",
                    options: ["A) Piscine Molitor Patel", "B) Piscine Maurice Patel", "C) Piscine Michael Patel", "D) Piscine Martin Patel"],
                    correct: "A",
                    points: 15
                }
            ],
            hard: [
                {
                    id: 16,
                    question: "The carnivorous island is populated by which animals?",
                    options: ["A) Monkeys", "B) Lemurs", "C) Meerkats", "D) Squirrels"],
                    correct: "C",
                    points: 20
                },
                {
                    id: 17,
                    question: "What does Pi discover inside the fruit on the carnivorous island?",
                    options: ["A) Seeds", "B) Human teeth", "C) Bones", "D) Insects"],
                    correct: "B",
                    points: 20
                },
                {
                    id: 18,
                    question: "Pi's nickname comes from which famous swimming pool?",
                    options: ["A) Piscine Molitor in Paris", "B) Piscine Olympique in Montreal", "C) Piscine Municipale in Lyon", "D) Piscine Publique in Quebec"],
                    correct: "A",
                    points: 20
                },
                {
                    id: 19,
                    question: "What literary technique does Martel primarily use in Life of Pi?",
                    options: ["A) Stream of consciousness", "B) Magical realism", "C) Gothic horror", "D) Social realism"],
                    correct: "B",
                    points: 20
                },
                {
                    id: 20,
                    question: "The frame narrative technique in Life of Pi is similar to which classic work?",
                    options: ["A) Moby Dick", "B) Heart of Darkness", "C) Robinson Crusoe", "D) Treasure Island"],
                    correct: "B",
                    points: 20
                },
                {
                    id: 21,
                    question: "What does the name 'Richard Parker' historically reference?",
                    options: ["A) A famous explorer", "B) A character from Edgar Allan Poe's work", "C) A real tiger from a zoo", "D) Yann Martel's friend"],
                    correct: "B",
                    points: 20
                },
                {
                    id: 22,
                    question: "Which philosophical concept is central to the novel's ending?",
                    options: ["A) Existentialism", "B) The nature of truth and faith", "C) Determinism", "D) Nihilism"],
                    correct: "B",
                    points: 20
                }
            ]
        };

        // Leaderboard storage (using memory since localStorage is not available)
        let leaderboards = {
            easy: [],
            medium: [],
            hard: []
        };

        function startQuiz(difficulty) {
            currentQuiz.difficulty = difficulty;
            currentQuiz.questions = shuffleArray([...quizQuestions[difficulty]]);
            currentQuiz.totalQuestions = currentQuiz.questions.length;
            currentQuiz.currentIndex = 0;
            currentQuiz.score = 0;
            currentQuiz.startTime = Date.now();
            currentQuiz.responses = [];

            document.getElementById('difficulty-selection').style.display = 'none';
            document.getElementById('quiz-interface').style.display = 'block';
            
            loadQuestion();
            startTimer();
        }

        function shuffleArray(array) {
            for (let i = array.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [array[i], array[j]] = [array[j], array[i]];
            }
            return array;
        }

        function loadQuestion() {
            const question = currentQuiz.questions[currentQuiz.currentIndex];
            
            document.getElementById('current-question').textContent = currentQuiz.currentIndex + 1;
            document.getElementById('current-score').textContent = currentQuiz.score;
            document.getElementById('question-text').textContent = question.question;
            
            const optionsContainer = document.getElementById('options-container');
            optionsContainer.innerHTML = '';
            
            question.options.forEach((option, index) => {
                const button = document.createElement('button');
                button.className = 'option';
                button.textContent = option;
                button.onclick = () => selectOption(String.fromCharCode(65 + index));
                optionsContainer.appendChild(button);
            });
            
            document.getElementById('submit-answer').disabled = true;
            document.getElementById('next-question').style.display = 'none';
            resetTimer();
        }

        function selectOption(letter) {
            // Remove previous selections
            document.querySelectorAll('.option').forEach(opt => {
                opt.classList.remove('selected');
            });
            
            // Mark selected option
            const options = document.querySelectorAll('.option');
            const index = letter.charCodeAt(0) - 65;
            options[index].classList.add('selected');
            
            // Store selection and enable submit
            currentQuiz.selectedAnswer = letter;
            document.getElementById('submit-answer').disabled = false;
        }

        function submitAnswer() {
            clearInterval(currentQuiz.timer);
            
            const question = currentQuiz.questions[currentQuiz.currentIndex];
            const isCorrect = currentQuiz.selectedAnswer === question.correct;
            const timeSpent = 30 - currentQuiz.timeLeft;
            
            // Record response
            currentQuiz.responses.push({
                questionId: question.id,
                selected: currentQuiz.selectedAnswer,
                correct: question.correct,
                isCorrect: isCorrect,
                timeSpent: timeSpent,
                pointsEarned: isCorrect ? question.points : 0
            });
            
            if (isCorrect) {
                currentQuiz.score += question.points;
                document.getElementById('current-score').textContent = currentQuiz.score;
            }
            
            // Show correct answer
            const options = document.querySelectorAll('.option');
            options.forEach((option, index) => {
                const letter = String.fromCharCode(65 + index);
                if (letter === question.correct) {
                    option.classList.add('correct');
                } else if (letter === currentQuiz.selectedAnswer && !isCorrect) {
                    option.classList.add('incorrect');
                }
                option.onclick = null; // Disable clicking
            });
            
            document.getElementById('submit-answer').style.display = 'none';
            document.getElementById('next-question').style.display = 'inline-block';
        }

        function nextQuestion() {
            currentQuiz.currentIndex++;
            
            if (currentQuiz.currentIndex >= currentQuiz.totalQuestions) {
                endQuiz();
            } else {
                loadQuestion();
                startTimer();
                document.getElementById('submit-answer').style.display = 'inline-block';
            }
        }

        function startTimer() {
            currentQuiz.timeLeft = 30;
            document.getElementById('time-left').textContent = currentQuiz.timeLeft;
            
            currentQuiz.timer = setInterval(() => {
                currentQuiz.timeLeft--;
                document.getElementById('time-left').textContent = currentQuiz.timeLeft;
                
                if (currentQuiz.timeLeft <= 0) {
                    clearInterval(currentQuiz.timer);
                    // Auto-submit with no answer
                    if (!currentQuiz.selectedAnswer) {
                        currentQuiz.selectedAnswer = '';
                    }
                    submitAnswer();
                }
            }, 1000);
        }

        function resetTimer() {
            clearInterval(currentQuiz.timer);
            currentQuiz.timeLeft = 30;
            currentQuiz.selectedAnswer = null;
        }

        function endQuiz() {
            const totalTime = Math.floor((Date.now() - currentQuiz.startTime) / 1000);
            const correctAnswers = currentQuiz.responses.filter(r => r.isCorrect).length;
            const percentage = Math.round((correctAnswers / currentQuiz.totalQuestions) * 100);
            
            document.getElementById('quiz-interface').style.display = 'none';
            document.getElementById('quiz-results').style.display = 'block';
            
            document.getElementById('final-score').textContent = currentQuiz.score;
            
            let message = `You answered ${correctAnswers} out of ${currentQuiz.totalQuestions} questions correctly (${percentage}%). `;
            if (percentage >= 90) {
                message += "Excellent work! You're a true Life of Pi expert! 🏆";
            } else if (percentage >= 75) {
                message += "Great job! You have a solid understanding of the novel! 👏";
            } else if (percentage >= 60) {
                message += "Good effort! Consider reviewing the material for better results. 📚";
            } else {
                message += "Keep studying! There's still much to learn about this fascinating novel. 💪";
            }
            
            document.getElementById('performance-message').textContent = message;
        }

        function saveScore() {
            const username = document.getElementById('username').value.trim();
            
            if (!username) {
                alert('Please enter a username!');
                return;
            }
            
            if (username.length > 50) {
                alert('Username must be 50 characters or less!');
                return;
            }
            
            const totalTime = Math.floor((Date.now() - currentQuiz.startTime) / 1000);
            const correctAnswers = currentQuiz.responses.filter(r => r.isCorrect).length;
            const percentage = Math.round((correctAnswers / currentQuiz.totalQuestions) * 100);
            
            const scoreEntry = {
                username: username,
                score: currentQuiz.score,
                percentage: percentage,
                correctAnswers: correctAnswers,
                totalQuestions: currentQuiz.totalQuestions,
                timeTaken: totalTime,
                difficulty: currentQuiz.difficulty,
                date: new Date().toLocaleString()
            };
            
            // Add to leaderboard
            leaderboards[currentQuiz.difficulty].push(scoreEntry);
            leaderboards[currentQuiz.difficulty].sort((a, b) => {
                if (b.score !== a.score) return b.score - a.score;
                if (b.percentage !== a.percentage) return b.percentage - a.percentage;
                return a.timeTaken - b.timeTaken;
            });
            
            // Keep only top 10
            leaderboards[currentQuiz.difficulty] = leaderboards[currentQuiz.difficulty].slice(0, 10);
            
            showLeaderboard();
            
            alert('Score saved successfully!');
        }

        function showLeaderboard() {
            const leaderboard = document.getElementById('leaderboard');
            const content = document.getElementById('leaderboard-content');
            
            leaderboard.style.display = 'block';
            
            const entries = leaderboards[currentQuiz.difficulty];
            
            if (entries.length === 0) {
                content.innerHTML = '<p>No scores yet. Be the first!</p>';
                return;
            }
            
            let html = `<h4>${currentQuiz.difficulty.toUpperCase()} Mode - Top Scores</h4>`;
            
            entries.forEach((entry, index) => {
                html += `
                    <div class="leaderboard-entry">
                        <span><strong>#${index + 1}</strong> ${entry.username}</span>
                        <span>${entry.score} pts (${entry.percentage}%) - ${Math.floor(entry.timeTaken / 60)}:${(entry.timeTaken % 60).toString().padStart(2, '0')}</span>
                    </div>
                `;
            });
            
            content.innerHTML = html;
        }

        function restartQuiz() {
            document.getElementById('quiz-results').style.display = 'none';
            document.getElementById('difficulty-selection').style.display = 'block';
            document.getElementById('username').value = '';
            
            // Reset quiz state
            currentQuiz = {
                questions: [],
                currentIndex: 0,
                score: 0,
                totalQuestions: 0,
                difficulty: '',
                timeLeft: 30,
                timer: null,
                startTime: null,
                responses: []
            };
        }

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial active section
            showSection('home');
        });
    </script>
</body>
</html>