<!-- resources/views/summary.blade.php -->
@extends('layouts.app')

@section('title', 'Plot Summary - Life of Pi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/summary.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="summary-container">
        <div class="summary-header">
            <h1 class="page-title">Plot Summary</h1>
            <p class="page-description">
                A comprehensive overview of the narrative arc, key events, and structural layers in Yann Martel’s <em>Life of Pi</em>.
            </p>
        </div>

        <div class="summary-content">
            {{-- PART ONE --}}
            <section class="summary-section">
                <div class="section-content">
                    <h2>Part One: Pondicherry</h2>
                    <div class="part-card">
                        <div class="part-layout">
                            <div class="part-text">
                                <p>
                                    In 1970s <strong>Pondicherry, India</strong>, young Piscine Molitor Patel—nicknamed “Pi” after the Piscine Molitor swimming pool in Paris—grows up in a zoo run by his rationalist father and gentle mother. 
                                    Early on, his father teaches him a harsh lesson about animal nature: he forces Pi to watch a tiger devour a live goat to prove that animals are not cuddly companions but dangerous, territorial beings.
                                </p>
                                <p>
                                    Spiritually curious and open-hearted, Pi explores and eventually practices <strong>Hinduism, Christianity, and Islam simultaneously</strong>, believing that all paths lead to God. His syncretic faith becomes central to his identity.
                                </p>
                                <p>
                                    When India’s political climate turns unstable during the Emergency, Pi’s family decides to emigrate to Canada. They sell the zoo and board the Japanese cargo ship <em>Tsimtsum</em> with their remaining animals.
                                </p>
                            </div>
                            <div class="part-image">
                                <div class="part-image-frame">
                                    <img 
                                        src="{{ asset('images/pondi.png') }}" 
                                        alt="Young Pi in Pondicherry zoo with animals" 
                                        class="img-fluid"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- PART TWO --}}
            <section class="summary-section">
                <div class="section-content">
                    <h2>Part Two: The Pacific Ocean</h2>
                    <div class="part-card">
                        <div class="part-layout">
                            <div class="part-text">
                                <p>
                                    The <em>Tsimtsum</em> sinks suddenly in the night. As Pi recalls: <em>“I think there was an explosion. But I can’t be sure.”</em> He is the only human to reach a lifeboat, which already holds a wounded zebra, a hyena, and an orangutan named Orange Juice (a former zoo resident).
                                </p>
                                <p>
                                    The hyena kills the zebra and then the orangutan. Soon after, a Bengal tiger named <strong>Richard Parker</strong>—who had been hiding under a tarp—emerges and kills the hyena. Pi, initially terrified, builds a small raft tethered to the boat to keep his distance. Using a whistle, food rations, and strict routines, he gradually trains Richard Parker and establishes dominance to coexist.
                                </p>
                                <p>
                                    For <strong>227 days</strong>, Pi survives through ingenuity: fishing, collecting rainwater, and maintaining daily prayers from all three faiths. His rituals provide structure, hope, and psychological resilience amid despair.
                                </p>
                                <p>
                                    The pair later discovers a mysterious floating island made of algae, teeming with meerkats and fresh water. But at night, Pi uncovers its horrifying truth: the island’s ponds turn acidic, digesting organic matter. Inside a fruit-like pod, he finds human teeth—evidence of past victims. Recognizing it as a “carnivorous paradise” offering comfort but no future, Pi gathers supplies and departs with Richard Parker.
                                </p>
                            </div>
                            <div class="part-image">
                                <div class="part-image-frame">
                                    <img 
                                        src="{{ asset('images/ocean.jpg') }}" 
                                        alt="Pi and Richard Parker on the lifeboat in the Pacific Ocean" 
                                        class="img-fluid"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- PART THREE --}}
            <section class="summary-section">
                <div class="section-content">
                    <h2>Part Three: Mexico &amp; The Interrogation</h2>
                    <div class="part-card">
                        <div class="part-layout">
                            <div class="part-text">
                                <p>
                                    Pi and Richard Parker finally wash ashore in Mexico. The tiger immediately vanishes into the jungle without a backward glance—leaving Pi heartbroken: “It broke my heart… after all we’d been through together.”
                                </p>
                                <p>
                                    Weeks later, Pi is interviewed by two Japanese insurance investigators seeking the cause of the <em>Tsimtsum</em>’s sinking. They reject his animal-filled account as implausible.
                                </p>
                                <p>
                                    Pi then offers a second, grim version: the lifeboat held four humans—himself, his mother, a sailor (with a broken leg), and the ship’s cook. The cook kills the sailor and Pi’s mother; in retaliation, Pi kills the cook. In this version, the zebra is the sailor, the hyena is the cook, the orangutan is Pi’s mother, and Richard Parker is Pi himself—his survival instinct made manifest.
                                </p>
                                <p>
                                    The officials choose the first story. Pi responds: <em>“And so it goes with God.”</em> The novel ends by affirming that faith, like storytelling, requires choosing meaning over mere fact.
                                </p>
                            </div>
                            <div class="part-image">
                                <div class="part-image-frame">
                                    <img 
                                        src="{{ asset('images/end.jpg') }}" 
                                        alt="Pi rescued on the Mexican shore after his journey" 
                                        class="img-fluid"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- FRAME NARRATIVE --}}
            <section class="summary-section">
                <div class="section-content">
                    <h2>Frame Narrative Structure</h2>
                    <div class="structure-content">
                        <div class="structure-item">
                            <h3>The Author’s Frame</h3>
                            <p>
                                The novel opens with a fictional “Author” in India, struggling with writer’s block, who hears of Pi’s story and travels to Canada to meet him. This frame positions Pi’s tale as a recorded narrative—raising questions about authenticity, memory, and the power of storytelling.
                            </p>
                        </div>
                        <div class="structure-item">
                            <h3>Dual Endings</h3>
                            <p>
                                The two versions of the shipwreck force readers to choose: do you prefer the story that’s factually plausible, or the one that offers beauty, meaning, and spiritual depth? Martel suggests the latter may be truer in the most human sense.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- RELIGION --}}
            <section class="summary-section">
                <div class="section-content">
                    <h2>Religion and Spirituality</h2>
                    <div class="religion-card">
                        <p>
                            Pi’s triple-faith practice is not contradiction but devotion. Throughout his ordeal, prayer becomes his anchor—Hindu chants at dawn, Christian hymns at noon, Muslim prayers at sunset. 
                        </p>
                        <p>
                            Religion provides more than comfort; it sustains his will to live. In the vast, indifferent ocean, faith turns isolation into communion and survival into sacred act. As Pi says: <em>“I just want to love God.”</em>
                        </p>
                        <p>
                            The novel ultimately portrays belief not as dogma, but as a vital, imaginative response to suffering—a “better story” that makes life bearable.
                        </p>
                    </div>
                </div>
            </section>

            {{-- THEMES --}}
            <section class="summary-section">
                <div class="section-content">
                    <h2>Key Themes Reinforced by the Plot</h2>
                    <div class="themes-grid">
                        <div class="theme-item">
                            <strong>Faith vs. Reason</strong>
                            <p>Pi’s spiritual practices coexist with practical survival skills, showing that belief and logic are not opposites but partners in endurance.</p>
                        </div>
                        <div class="theme-item">
                            <strong>Storytelling as Truth</strong>
                            <p>The “better story” may not be factual, but it carries emotional and moral truth—making it more meaningful than cold reality.</p>
                        </div>
                        <div class="theme-item">
                            <strong>Human-Animal Boundary</strong>
                            <p>Richard Parker embodies Pi’s primal self; their coexistence suggests civilization requires both discipline and wild instinct.</p>
                        </div>
                        <div class="theme-item">
                            <strong>Loss &amp; Resilience</strong>
                            <p>From family to home to innocence, Pi loses everything—yet rebuilds his life through narrative and faith.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- CONCLUSION --}}
            <section class="summary-section">
                <div class="section-content">
                    <h2>Conclusion</h2>
                    <div class="conclusion-card">
                        <p>
                            <em>Life of Pi</em> transcends adventure to become a profound meditation on how humans use stories to survive chaos. 
                            By asking, <em>“Which story do you prefer?”</em> Martel invites readers to reflect not just on Pi’s journey, but on their own beliefs about truth, suffering, and the divine.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
