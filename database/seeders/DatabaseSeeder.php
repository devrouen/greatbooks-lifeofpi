<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\QuestionAnswer;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Easy: Multiple Choice, True/False, Identification
        $this->seedEasyMultipleChoice();
        $this->seedEasyTrueFalse();
        $this->seedEasyIdentification();

        // Medium: All Easy types + Fill in the Blank
        $this->seedMediumMultipleChoice();
        $this->seedMediumTrueFalse();
        $this->seedMediumIdentification();
        $this->seedMediumFillInBlank();

        // Hard: All types including Enumeration
        $this->seedHardMultipleChoice();
        $this->seedHardTrueFalse();
        $this->seedHardIdentification();
        $this->seedHardFillInBlank();
        $this->seedHardEnumeration();
    }

    /* --------------------------------------------------------------------------
     *  EASY - MULTIPLE CHOICE (12 questions)
     * -------------------------------------------------------------------------- */
    private function seedEasyMultipleChoice()
    {
        $questions = [
            [
                "What is Pi's full name?",
                ["Piscine Molitor Patel", "Pieter Moses Patel", "Pritam Mohan Patel", "Prakash Milan Patel"],
                0
            ],
            [
                "Which animal stays with Pi the longest on the lifeboat?",
                ["A zebra", "A hyena", "Richard Parker the tiger", "An orangutan"],
                2
            ],
            [
                "Which city in India is Pi originally from?",
                ["Mumbai", "Pondicherry", "Goa", "Calcutta"],
                1
            ],
            [
                "What type of animal is Richard Parker?",
                ["A lion", "A Bengal tiger", "A cougar", "A panther"],
                1
            ],
            [
                "What is Pi's father's occupation?",
                ["Teacher", "Zookeeper", "Doctor", "Fisherman"],
                1
            ],
            [
                "What is the name of the ship that sinks?",
                ["Titanic", "Tsimtsum", "Oceanic", "Liberty"],
                1
            ],
            [
                "Where is Pi's family moving to when the ship sinks?",
                ["United States", "Australia", "Canada", "England"],
                2
            ],
            [
                "What does Pi use to fish while on the lifeboat?",
                ["A net", "Fishing hooks and line", "His hands", "A spear"],
                1
            ],
            [
                "What is the name of the swimming pool Pi is named after?",
                ["Molitor", "Olympic", "Paradise", "Neptune"],
                0
            ],
            [
                "Who interviews Pi at the end of the story?",
                ["Canadian police officers", "Japanese maritime officials", "Indian embassy staff", "American coast guard"],
                1
            ],
            [
                "What does Pi study at university?",
                ["Marine Biology", "Theology", "Zoology and Religious Studies", "Literature"],
                2
            ],
            [
                "How many days does Pi survive at sea?",
                ["180 days", "200 days", "227 days", "250 days"],
                2
            ]
        ];

        $this->insertMCQ($questions, 'easy');
    }

    /* --------------------------------------------------------------------------
     *  EASY - TRUE/FALSE (6 questions)
     * -------------------------------------------------------------------------- */
    private function seedEasyTrueFalse()
    {
        $questions = [
            ["Pi survived exactly 227 days at sea.", true],
            ["Pi's family owned a zoo in Pondicherry.", true],
            ["Richard Parker is a lion.", false],
            ["Pi practices only Hinduism throughout his life.", false],
            ["The ship Tsimtsum was traveling to Canada when it sank.", true],
            ["Pi's nickname comes from a famous swimming pool in Paris.", true],
        ];

        $this->insertTrueFalse($questions, 'easy');
    }

    /* --------------------------------------------------------------------------
     *  EASY - IDENTIFICATION (4 questions)
     * -------------------------------------------------------------------------- */
    private function seedEasyIdentification()
    {
        $questions = [
            ["What is the name of the ship that sank?", "Tsimtsum"],
            ["What is Pi's shortened first name?", "Pi"],
            ["What country was Pi's family moving to?", "Canada"],
            ["What is the name of the tiger on the lifeboat?", "Richard Parker"],
        ];

        $this->insertIdentification($questions, 'easy');
    }

    /* --------------------------------------------------------------------------
     *  MEDIUM - MULTIPLE CHOICE (12 questions)
     * -------------------------------------------------------------------------- */
    private function seedMediumMultipleChoice()
    {
        $questions = [
            [
                "How many religions does Pi practice simultaneously?",
                ["One", "Two", "Three", "Four"],
                2
            ],
            [
                "Why does Pi's family decide to sell the zoo and move to Canada?",
                ["Financial difficulties", "Political instability under Indira Gandhi", "Better education opportunities", "Health reasons"],
                1
            ],
            [
                "What does Pi build to maintain distance from Richard Parker?",
                ["A wooden shield", "A secondary raft", "A protective cage", "A canvas barrier"],
                1
            ],
            [
                "How did Richard Parker get his name?",
                ["Pi named him", "His father named him", "The names of the hunter and tiger were accidentally switched", "He was already named at birth"],
                2
            ],
            [
                "Which animal does the hyena kill first on the lifeboat?",
                ["The tiger", "The zebra", "The orangutan", "Richard Parker"],
                1
            ],
            [
                "What does Pi discover about the mysterious island?",
                ["It's inhabited by people", "It's carnivorous and deadly at night", "It's a mirage", "It's full of fresh water"],
                1
            ],
            [
                "What method does Pi use to train Richard Parker?",
                ["Using food as reward", "Making loud noises with a whistle", "Showing dominance through eye contact", "Using a whip"],
                1
            ],
            [
                "In the alternative story, who does Richard Parker represent?",
                ["Pi himself", "The French cook", "A Japanese sailor", "Pi's father"],
                1
            ],
            [
                "What religious artifact does Pi keep throughout his journey?",
                ["A cross", "A prayer rug", "A statue of Ganesha", "All of the above"],
                3
            ],
            [
                "What does Pi find inside the island's trees at night?",
                ["Birds", "Human teeth", "Fruit", "Fresh water"],
                1
            ],
            [
                "Who is Orange Juice?",
                ["A fruit Pi eats", "An orangutan from the zoo", "A sailor", "Pi's sister"],
                1
            ],
            [
                "What does Pi use as a seasickness remedy?",
                ["Ginger", "Rest", "Fresh water", "Prayer"],
                2
            ]
        ];

        $this->insertMCQ($questions, 'medium');
    }

    /* --------------------------------------------------------------------------
     *  MEDIUM - TRUE/FALSE (6 questions)
     * -------------------------------------------------------------------------- */
    private function seedMediumTrueFalse()
    {
        $questions = [
            ["Pi was originally named after a swimming pool.", true],
            ["The lifeboat had no survival supplies when Pi boarded it.", false],
            ["Richard Parker was originally supposed to be named 'Thirsty'.", true],
            ["Pi's father supported his interest in multiple religions.", false],
            ["Pi was the only human survivor of the Tsimtsum sinking.", true],
            ["The island Pi discovered provided permanent safety.", false],
        ];

        $this->insertTrueFalse($questions, 'medium');
    }

    /* --------------------------------------------------------------------------
     *  MEDIUM - IDENTIFICATION (4 questions)
     * -------------------------------------------------------------------------- */
    private function seedMediumIdentification()
    {
        $questions = [
            ["What is the name of the orangutan on the lifeboat?", "Orange Juice"],
            ["Which animal kills the hyena on the lifeboat?", "Richard Parker"],
            ["What tool does Pi use to make noise and assert dominance over Richard Parker?", "Whistle"],
            ["What city in France is Pi's full name associated with?", "Paris"],
        ];

        $this->insertIdentification($questions, 'medium');
    }

    /* --------------------------------------------------------------------------
     *  MEDIUM - FILL IN THE BLANK (4 questions)
     * -------------------------------------------------------------------------- */
    private function seedMediumFillInBlank()
    {
        $questions = [
            ["Pi survived on a lifeboat with a Bengal tiger named ________.", "Richard Parker"],
            ["Pi grew up in the city of ________, India.", "Pondicherry"],
            ["Pi practices three religions: Hinduism, Christianity, and ________.", "Islam"],
            ["The ship that sank was called the ________.", "Tsimtsum"],
        ];

        $this->insertFillInBlank($questions, 'medium');
    }

    /* --------------------------------------------------------------------------
     *  HARD - MULTIPLE CHOICE (12 questions)
     * -------------------------------------------------------------------------- */
    private function seedHardMultipleChoice()
    {
        $questions = [
            [
                "What is the significance of Pi's name 'Piscine'?",
                ["It means 'fish' in French", "It's named after a famous Parisian swimming pool", "It's a family name", "It means 'survivor' in Hindi"],
                1
            ],
            [
                "What does the carnivorous island represent symbolically in the story?",
                ["Hope and despair", "False paradise or comfort that can consume you", "Pi's imagination", "Religious salvation"],
                1
            ],
            [
                "According to Pi, what is the important thing about the two stories he tells?",
                ["Which one has more details", "Which one is more believable", "Which one is true", "Which one you prefer"],
                3
            ],
            [
                "What causes Pi to initially change his name from Piscine to Pi?",
                ["Classmates mocked him by calling him 'Pissing'", "His teacher couldn't pronounce it", "He wanted a shorter name", "His father suggested it"],
                0
            ],
            [
                "In the human version of the story, who does the zebra represent?",
                ["A French cook", "A Taiwanese sailor", "Pi's mother", "Pi himself"],
                1
            ],
            [
                "What mathematical concept is Pi's nickname associated with?",
                ["The golden ratio", "The mathematical constant π (pi)", "Fibonacci sequence", "Infinity"],
                1
            ],
            [
                "Why does Pi leave the carnivorous island?",
                ["He runs out of food", "He discovers human teeth in the tree, realizing the island is deadly", "Richard Parker attacks him", "A storm forces him to leave"],
                1
            ],
            [
                "What does Pi claim is the worst thing about being at sea?",
                ["Hunger", "Fear of Richard Parker", "Loneliness and loss of family", "The physical pain"],
                2
            ],
            [
                "Who does the hyena represent in the allegorical human story?",
                ["The sailor", "The cook", "Pi's father", "A stowaway"],
                1
            ],
            [
                "What role does storytelling play in Pi's survival?",
                ["It keeps him entertained", "It helps him process trauma and maintain sanity", "It helps him remember his family", "It passes the time"],
                1
            ],
            [
                "Why do the Japanese officials prefer the story without animals?",
                ["It's more believable and fits their report format", "It has more details", "It explains the sinking better", "They don't believe in tigers"],
                0
            ],
            [
                "What is the central theme regarding faith and reason in the novel?",
                ["Faith always wins over reason", "Reason is superior to faith", "Both faith and reason can coexist and help survival", "Neither faith nor reason matters"],
                2
            ]
        ];

        $this->insertMCQ($questions, 'hard');
    }

    /* --------------------------------------------------------------------------
     *  HARD - TRUE/FALSE (6 questions)
     * -------------------------------------------------------------------------- */
    private function seedHardTrueFalse()
    {
        $questions = [
            ["The story suggests that Richard Parker may represent Pi's survival instinct or darker nature.", true],
            ["Pi's father demonstrated the danger of wild animals by feeding a tiger in front of Pi.", false],
            ["The carnivorous island exists only during the day and becomes deadly at night.", true],
            ["In the human story, Pi's mother is represented by the orangutan Orange Juice.", true],
            ["The novel suggests there is one definitively true version of Pi's survival story.", false],
            ["Pi loses his religious faith during his ordeal at sea.", false],
        ];

        $this->insertTrueFalse($questions, 'hard');
    }

    /* --------------------------------------------------------------------------
     *  HARD - IDENTIFICATION (4 questions)
     * -------------------------------------------------------------------------- */
    private function seedHardIdentification()
    {
        $questions = [
            ["What object does Pi find in the island's tree that makes him decide to leave?", "Human teeth"],
            ["Who does Orange Juice represent in the allegorical human story?", "Pi's mother"],
            ["What animal does Pi's father use to teach him about the danger of wild animals?", "Tiger"],
            ["What does Pi study at the University of Toronto?", "Zoology and Religious Studies"],
        ];

        $this->insertIdentification($questions, 'hard');
    }

    /* --------------------------------------------------------------------------
     *  HARD - FILL IN THE BLANK (4 questions)
     * -------------------------------------------------------------------------- */
    private function seedHardFillInBlank()
    {
        $questions = [
            ["The island Pi discovered was made of ________ and could digest living things.", "Algae"],
            ["In the human version of events, the ________ killed both the sailor and Pi's mother.", "Cook"],
            ["Pi demonstrates that both ________ and reason are necessary for survival.", "Faith"],
            ["Richard Parker leaves Pi without looking back, symbolizing the separation between Pi and his ________.", "Survival instinct"],
        ];

        $this->insertFillInBlank($questions, 'hard');
    }

    /* --------------------------------------------------------------------------
     *  HARD - ENUMERATION (4 questions)
     * -------------------------------------------------------------------------- */
    private function seedHardEnumeration()
    {
        $questions = [
            ["Name three religions that Pi practices.", ["Hinduism", "Christianity", "Islam"]],
            ["List three animals that were on the lifeboat with Pi.", ["Richard Parker", "Zebra", "Hyena", "Orange Juice"]],
            ["Name three survival tools or supplies Pi found in the lifeboat locker.", ["Rations", "Fishing gear", "Solar stills", "Flares", "Life jackets"]],
            ["List three symbolic or thematic elements in the novel.", ["Faith", "Survival", "Storytelling", "Reality", "Truth"]],
        ];

        $this->insertEnumeration($questions, 'hard');
    }

    /* --------------------------------------------------------------------------
     *  HELPER METHODS
     * -------------------------------------------------------------------------- */

    private function insertMCQ($questions, $difficulty)
    {
        $points = $this->getPointsByDifficulty($difficulty);
        
        foreach ($questions as $q) {
            $question = Question::create([
                'question_text' => $q[0],
                'question_type' => 'multiple_choice',
                'difficulty' => $difficulty,
                'points' => $points,
                'is_active' => true
            ]);

            foreach ($q[1] as $index => $optionText) {
                QuestionOption::create([
                    'question_id' => $question->question_id,
                    'option_text' => $optionText,
                    'is_correct' => $index == $q[2]
                ]);
            }
        }
    }

    private function insertTrueFalse($questions, $difficulty)
    {
        $points = $this->getPointsByDifficulty($difficulty);
        
        foreach ($questions as $q) {
            $question = Question::create([
                'question_text' => $q[0],
                'question_type' => 'true_false',
                'difficulty' => $difficulty,
                'points' => $points,
                'is_active' => true
            ]);

            QuestionOption::create([
                'question_id' => $question->question_id,
                'option_text' => 'True',
                'is_correct' => $q[1]
            ]);

            QuestionOption::create([
                'question_id' => $question->question_id,
                'option_text' => 'False',
                'is_correct' => !$q[1]
            ]);
        }
    }

    private function insertIdentification($questions, $difficulty)
    {
        $points = $this->getPointsByDifficulty($difficulty);
        
        foreach ($questions as $q) {
            $question = Question::create([
                'question_text' => $q[0],
                'question_type' => 'identification',
                'difficulty' => $difficulty,
                'points' => $points,
                'is_active' => true
            ]);

            QuestionAnswer::create([
                'question_id' => $question->question_id,
                'answer_text' => $q[1],
                'is_case_sensitive' => false
            ]);
        }
    }

    private function insertFillInBlank($questions, $difficulty)
    {
        $points = $this->getPointsByDifficulty($difficulty);
        
        foreach ($questions as $q) {
            $question = Question::create([
                'question_text' => $q[0],
                'question_type' => 'fill_in_blank',
                'difficulty' => $difficulty,
                'points' => $points,
                'is_active' => true
            ]);

            QuestionAnswer::create([
                'question_id' => $question->question_id,
                'answer_text' => $q[1],
                'is_case_sensitive' => false
            ]);
        }
    }

    private function insertEnumeration($questions, $difficulty)
    {
        $points = $this->getPointsByDifficulty($difficulty);
        
        foreach ($questions as $q) {
            $question = Question::create([
                'question_text' => $q[0],
                'question_type' => 'enumeration',
                'difficulty' => $difficulty,
                'points' => $points,
                'is_active' => true
            ]);

            foreach ($q[1] as $ans) {
                QuestionAnswer::create([
                    'question_id' => $question->question_id,
                    'answer_text' => $ans,
                    'is_case_sensitive' => false
                ]);
            }
        }
    }

    private function getPointsByDifficulty($difficulty)
    {
        switch ($difficulty) {
            case 'easy':
                return 10;
            case 'medium':
                return 15;
            case 'hard':
                return 20;
            default:
                return 10;
        }
    }
}