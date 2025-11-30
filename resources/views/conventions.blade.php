@extends('layouts.app')

@section('title', 'Literary Conventions - Life of Pi Analysis')

@section('content')
<div class="container">
    <div class="conventions-container">
        <div class="conventions-header">
            <h1 class="page-title">Literary Conventions</h1>
            <p class="page-description">
                Explore the narrative techniques, genre elements, and literary movements that define Life of Pi.
            </p>
        </div>

        <div class="conventions-content">
            <section class="convention-section">
                <div class="section-icon">📚</div>
                <div class="section-content">
                    <h2>Literary Movement</h2>
                    <div class="movement-info">
                        <div class="movement-card primary">
                            <h3>Contemporary Literary Fiction</h3>
                            <p>
                                Life of Pi belongs to the tradition of contemporary literary fiction that emerged 
                                in the late 20th century, characterized by psychological depth, experimental 
                                narrative techniques, and exploration of existential themes.
                            </p>
                        </div>
                        
                        <div class="movement-influences">
                            <h4>Influences & Connections:</h4>
                            <div class="influences-grid">
                                <div class="influence-item">
                                    <strong>Postcolonial Literature</strong>
                                    <p>Exploration of identity, displacement, and cultural hybridity</p>
                                </div>
                                <div class="influence-item">
                                    <strong>Magical Realism</strong>
                                    <p>Blending fantastical elements with realistic narrative</p>
                                </div>
                                <div class="influence-item">
                                    <strong>Philosophical Fiction</strong>
                                    <p>Deep engagement with questions of existence, faith, and truth</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="convention-section">
                <div class="section-icon">🎭</div>
                <div class="section-content">
                    <h2>Genre Classifications</h2>
                    <div class="genres-grid">
                        <div class="genre-card">
                            <h3>Survival Literature</h3>
                            <p>
                                Follows the tradition of survival narratives like Robinson Crusoe and 
                                The Old Man and the Sea, focusing on human endurance against nature.
                            </p>
                            <div class="genre-elements">
                                <span class="element-tag">Isolation</span>
                                <span class="element-tag">Resource Scarcity</span>
                                <span class="element-tag">Human vs. Nature</span>
                                <span class="element-tag">Psychological Endurance</span>
                            </div>
                        </div>

                        <div class="genre-card">
                            <h3>Philosophical Fiction</h3>
                            <p>
                                Engages with deep philosophical questions about reality, truth, faith, 
                                and the meaning of existence through narrative exploration.
                            </p>
                            <div class="genre-elements">
                                <span class="element-tag">Existential Themes</span>
                                <span class="element-tag">Religious Philosophy</span>
                                <span class="element-tag">Truth vs. Fiction</span>
                                <span class="element-tag">Moral Questions</span>
                            </div>
                        </div>

                        <div class="genre-card">
                            <h3>Coming-of-Age</h3>
                            <p>
                                Chronicles Pi's transformation from innocence to experience, 
                                marking his passage from childhood to adulthood through trial.
                            </p>
                            <div class="genre-elements">
                                <span class="element-tag">Loss of Innocence</span>
                                <span class="element-tag">Self-Discovery</span>
                                <span class="element-tag">Maturation</span>
                                <span class="element-tag">Identity Formation</span>
                            </div>
                        </div>

                        <div class="genre-card">
                            <h3>Adventure Fiction</h3>
                            <p>
                                Contains elements of traditional adventure stories with exotic 
                                locations, dangerous situations, and extraordinary circumstances.
                            </p>
                            <div class="genre-elements">
                                <span class="element-tag">Exotic Settings</span>
                                <span class="element-tag">Physical Danger</span>
                                <span class="element-tag">Unexpected Encounters</span>
                                <span class="element-tag">Journey Motif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="convention-section">
                <div class="section-icon">✍️</div>
                <div class="section-content">
                    <h2>Narrative Techniques</h2>
                    <div class="techniques-container">
                        <div class="technique-item">
                            <h3>Frame Narrative</h3>
                            <p>
                                The story is presented as Pi's account told to the author, creating multiple 
                                layers of storytelling and raising questions about narrative reliability.
                            </p>
                            <div class="technique-details">
                                <h4>Key Features:</h4>
                                <ul>
                                    <li>Author as character collecting Pi's story</li>
                                    <li>Multiple temporal layers (present telling, past events)</li>
                                    <li>Questions of authenticity and verification</li>
                                    <li>Reader as final judge of truth</li>
                                </ul>
                            </div>
                        </div>

                        <div class="technique-item">
                            <h3>Unreliable Narration</h3>
                            <p>
                                Pi's account contains inconsistencies and alternative versions, 
                                challenging readers to question the nature of truth and storytelling.
                            </p>
                            <div class="technique-details">
                                <h4>Key Features:</h4>
                                <ul>
                                    <li>Two contradictory versions of the same events</li>
                                    <li>Gaps and omissions in the narrative</li>
                                    <li>Subjective interpretation of experiences</li>
                                    <li>Reader participation in meaning-making</li>
                                </ul>
                            </div>
                        </div>

                        <div class="technique-item">
                            <h3>Allegorical Structure</h3>
                            <p>
                                The survival story operates on multiple levels of meaning, 
                                with characters and events representing larger philosophical concepts.
                            </p>
                            <div class="technique-details">
                                <h4>Key Allegories:</h4>
                                <ul>
                                    <li>Richard Parker as Pi's survival instinct/id</li>
                                    <li>The ocean as the unconscious mind</li>
                                    <li>The lifeboat as civilization/conscious mind</li>
                                    <li>The island as false paradise/temptation</li>
                                </ul>
                            </div>
                        </div>

                        <div class="technique-item">
                            <h3>Intertextuality</h3>
                            <p>
                                The novel draws from and references multiple literary, religious, 
                                and cultural traditions, creating a rich tapestry of meaning.
                            </p>
                            <div class="technique-details">
                                <h4>Referenced Traditions:</h4>
                                <ul>
                                    <li>Biblical narratives (Noah's Ark, Jonah and the Whale)</li>
                                    <li>Hindu mythology and philosophy</li>
                                    <li>Islamic storytelling traditions</li>
                                    <li>Western survival literature</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="convention-section">
                <div class="section-icon">🎨</div>
                <div class="section-content">
                    <h2>Literary Devices</h2>
                    <div class="devices-container">
                        <div class="devices-row">
                            <div class="device-card">
                                <h3>Symbolism</h3>
                                <div class="symbol-examples">
                                    <div class="symbol-item">
                                        <strong>The Tiger (Richard Parker)</strong>
                                        <p>Represents Pi's will to survive, his animal nature, and the fierce instinct needed for survival</p>
                                    </div>
                                    <div class="symbol-item">
                                        <strong>The Ocean</strong>
                                        <p>Symbolizes the vastness of existence, the unconscious, and life's unpredictable nature</p>
                                    </div>
                                    <div class="symbol-item">
                                        <strong>The Lifeboat</strong>
                                        <p>Represents civilization, consciousness, and the human attempt to create order from chaos</p>
                                    </div>
                                </div>
                            </div>

                            <div class="device-card">
                                <h3>Metaphor & Imagery</h3>
                                <div class="metaphor-examples">
                                    <div class="metaphor-item">
                                        <strong>Survival as Faith</strong>
                                        <p>Physical survival mirrors spiritual endurance and belief in meaning</p>
                                    </div>
                                    <div class="metaphor-item">
                                        <strong>Animals as Human Nature</strong>
                                        <p>Zoo animals represent different aspects of human behavior and civilization</p>
                                    </div>
                                    <div class="metaphor-item">
                                        <strong>Journey as Transformation</strong>
                                        <p>The ocean voyage represents spiritual and psychological transformation</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="devices-row">
                            <div class="device-card">
                                <h3>Irony</h3>
                                <ul>
                                    <li>Pi's name connects him to infinity and circularity</li>
                                    <li>The tiger that threatens Pi also saves his life</li>
                                    <li>Multiple religions provide unified spiritual strength</li>
                                    <li>The "better" story may be less factually true</li>
                                </ul>
                            </div>

                            <div class="device-card">
                                <h3>Paradox</h3>
                                <ul>
                                    <li>Reason and faith coexisting in Pi's worldview</li>
                                    <li>The tiger as both salvation and threat</li>
                                    <li>Truth found through seemingly false stories</li>
                                    <li>Civilization maintained through "animal" behavior</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="convention-section">
                <div class="section-icon">🌍</div>
                <div class="section-content">
                    <h2>Cultural & Historical Context</h2>
                    <div class="context-grid">
                        <div class="context-card">
                            <h3>Postcolonial Perspective</h3>
                            <p>
                                Written from the viewpoint of cultural displacement and immigration, 
                                reflecting the Canadian immigrant experience and questions of belonging.
                            </p>
                        </div>

                        <div class="context-card">
                            <h3>Religious Pluralism</h3>
                            <p>
                                Reflects contemporary debates about religious tolerance and the possibility 
                                of finding truth across different faith traditions.
                            </p>
                        </div>

                        <div class="context-card">
                            <h3>Environmental Awareness</h3>
                            <p>
                                Written during growing environmental consciousness, exploring human relationship 
                                with nature and animals in the modern world.
                            </p>
                        </div>

                        <div class="context-card">
                            <h3>Narrative Skepticism</h3>
                            <p>
                                Reflects postmodern questioning of absolute truth and the reliability 
                                of storytelling in an age of information skepticism.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="convention-section">
                <div class="section-icon">📖</div>
                <div class="section-content">
                    <h2>Literary Precedents & Influences</h2>
                    <div class="precedents-container">
                        <div class="precedent-category">
                            <h3>Survival Literature</h3>
                            <div class="precedent-examples">
                                <div class="precedent-item">
                                    <strong>Robinson Crusoe</strong> by Daniel Defoe
                                    <p>Isolated survival, man versus nature, spiritual awakening</p>
                                </div>
                                <div class="precedent-item">
                                    <strong>The Old Man and the Sea</strong> by Ernest Hemingway
                                    <p>Man's struggle against nature, dignity in defeat, spiritual endurance</p>
                                </div>
                                <div class="precedent-item">
                                    <strong>Lord of the Flies</strong> by William Golding
                                    <p>Civilization versus savagery, loss of innocence, human nature</p>
                                </div>
                            </div>
                        </div>

                        <div class="precedent-category">
                            <h3>Philosophical Fiction</h3>
                            <div class="precedent-examples">
                                <div class="precedent-item">
                                    <strong>The Stranger</strong> by Albert Camus
                                    <p>Existential themes, absurdity of existence, individual versus society</p>
                                </div>
                                <div class="precedent-item">
                                    <strong>Siddhartha</strong> by Hermann Hesse
                                    <p>Spiritual journey, Eastern philosophy, search for enlightenment</p>
                                </div>
                                <div class="precedent-item">
                                    <strong>The Life of Reason</strong> by George Santayana
                                    <p>Reason and faith, philosophical inquiry, meaning-making</p>
                                </div>
                            </div>
                        </div>

                        <div class="precedent-category">
                            <h3>Magical Realism</h3>
                            <div class="precedent-examples">
                                <div class="precedent-item">
                                    <strong>One Hundred Years of Solitude</strong> by Gabriel García Márquez
                                    <p>Fantastical elements in realistic settings, cyclical time, myth-making</p>
                                </div>
                                <div class="precedent-item">
                                    <strong>The Master and Margarita</strong> by Mikhail Bulgakov
                                    <p>Reality and fantasy intertwined, religious themes, narrative complexity</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="convention-section">
                <div class="section-icon">🎯</div>
                <div class="section-content">
                    <h2>Innovation & Contribution</h2>
                    <div class="innovation-content">
                        <div class="innovation-item">
                            <h3>Unique Narrative Structure</h3>
                            <p>
                                Martel innovates by presenting two contradictory versions of the same story, 
                                forcing readers to actively participate in determining truth and meaning.
                            </p>
                        </div>

                        <div class="innovation-item">
                            <h3>Religious Synthesis</h3>
                            <p>
                                The novel's approach to combining multiple religious traditions without 
                                syncretism offers a fresh perspective on faith and spirituality in literature.
                            </p>
                        </div>

                        <div class="innovation-item">
                            <h3>Survival Allegory</h3>
                            <p>
                                While survival literature typically focuses on physical endurance, 
                                Life of Pi equally emphasizes psychological and spiritual survival.
                            </p>
                        </div>

                        <div class="innovation-item">
                            <h3>Postcolonial Adventure</h3>
                            <p>
                                Reframes the adventure genre from a postcolonial perspective, 
                                questioning Western narratives of exploration and discovery.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@push('styles')
<style>
.conventions-container {
    max-width: 1200px;
    margin: 0 auto;
}

.convention-section {
    display: flex;
    gap: 2rem;
    margin: 3rem 0;
    padding: 2.5rem;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
}

.section-icon {
    flex: 0 0 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    background: var(--gradient-primary);
    border-radius: 50%;
    color: white;
}

.section-content {
    flex: 1;
}

.section-content h2 {
    font-size: 2rem;
    margin-bottom: 1.5rem;
    color: var(--text-primary);
}

.movement-card {
    background: var(--bg-accent);
    padding: 2rem;
    border-radius: var(--radius-md);
    margin-bottom: 2rem;
    border-left: 4px solid var(--primary-color);
}

.influences-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
    margin-top: 1.5rem;
}

.influence-item {
    background: white;
    padding: 1rem;
    border-radius: var(--radius-sm);
    border: 1px solid var(--border-color);
}

.genres-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.genre-card {
    background: var(--bg-secondary);
    padding: 2rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.genre-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.genre-card h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-size: 1.25rem;
}

.genre-elements {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1rem;
}

.element-tag {
    background: var(--primary-color);
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: var(--radius-sm);
    font-size: 0.875rem;
    font-weight: 500;
}

.techniques-container {
    display: grid;
    gap: 2rem;
    margin-top: 1.5rem;
}

.technique-item {
    background: var(--bg-secondary);
    padding: 2rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
}

.technique-item h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.technique-details {
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 2px solid var(--border-color);
}

.technique-details h4 {
    color: var(--text-primary);
    margin-bottom: 1rem;
}

.technique-details ul {
    list-style: none;
    padding: 0;
}

.technique-details li {
    padding: 0.5rem 0;
    padding-left: 1.5rem;
    position: relative;
    color: var(--text-secondary);
    line-height: 1.6;
}

.technique-details li::before {
    content: '→';
    position: absolute;
    left: 0;
    color: var(--primary-color);
    font-weight: 600;
}

.devices-container {
    margin-top: 1.5rem;
}

.devices-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.device-card {
    background: white;
    padding: 2rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
}

.device-card h3 {
    color: var(--primary-color);
    margin-bottom: 1.5rem;
    font-size: 1.25rem;
}

.symbol-examples, .metaphor-examples {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.symbol-item, .metaphor-item {
    padding: 1rem;
    background: var(--bg-accent);
    border-radius: var(--radius-sm);
    border-left: 3px solid var(--accent-color);
}

.symbol-item strong, .metaphor-item strong {
    color: var(--text-primary);
    display: block;
    margin-bottom: 0.5rem;
}

.context-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.context-card {
    background: var(--bg-secondary);
    padding: 1.5rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    border-left: 4px solid var(--accent-color);
}

.context-card h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
}

.precedents-container {
    margin-top: 1.5rem;
}

.precedent-category {
    margin-bottom: 2.5rem;
}

.precedent-category h3 {
    color: var(--primary-color);
    margin-bottom: 1rem;
    font-size: 1.5rem;
    border-bottom: 2px solid var(--border-color);
    padding-bottom: 0.5rem;
}

.precedent-examples {
    display: grid;
    gap: 1rem;
}

.precedent-item {
    background: white;
    padding: 1.5rem;
    border-radius: var(--radius-md);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
    border-left: 4px solid var(--secondary-color);
}

.precedent-item strong {
    color: var(--text-primary);
    display: block;
    margin-bottom: 0.5rem;
    font-size: 1.1rem;
}

.innovation-content {
    display: grid;
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.innovation-item {
    background: var(--bg-accent);
    padding: 2rem;
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
    border-left: 4px solid var(--success-color);
}

.innovation-item h3 {
    color: var(--success-color);
    margin-bottom: 1rem;
    font-size: 1.25rem;
}

@media (max-width: 768px) {
    .convention-section {
        flex-direction: column;
        padding: 1.5rem;
    }

    .section-icon {
        align-self: center;
        flex: 0 0 60px;
        height: 60px;
        font-size: 2rem;
    }

    .genres-grid {
        grid-template-columns: 1fr;
    }

    .devices-row {
        grid-template-columns: 1fr;
    }

    .context-grid {
        grid-template-columns: 1fr;
    }

    .influences-grid {
        grid-template-columns: 1fr;
    }

    .element-tag {
        font-size: 0.75rem;
        padding: 0.2rem 0.5rem;
    }
}
</style>
@endpush
@endsection