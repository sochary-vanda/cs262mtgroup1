@extends('layout')
@section('title', 'Science — STEM Hub')

@section('content')
<main>
    <div class="article-header">
        <a href="/" class="back">&larr; All fields</a>
        <span class="card-tag" style="background:var(--tag-sci);color:#2d6b2d;display:inline-block;font-family:var(--mono);font-size:0.65rem;letter-spacing:0.08em;text-transform:uppercase;padding:3px 8px;border-radius:3px;margin-bottom:1rem;">Science</span>
        <h1>Understanding the natural world</h1>
        <p class="article-meta">Physics · Chemistry · Biology · Earth Sciences</p>
    </div>

    <div class="article-body">

        <p>Science is the systematic study of the structure and behaviour of the physical and natural world through observation, experimentation, and evidence. It is the oldest and most fundamental of the STEM disciplines — every other field draws on its methods.</p>

        <div class="stat-row">
            <div class="stat"><div class="stat-num">~8M</div><div class="stat-desc">Active researchers globally</div></div>
            <div class="stat"><div class="stat-num">3M+</div><div class="stat-desc">Papers published per year</div></div>
            <div class="stat"><div class="stat-num">200+</div><div class="stat-desc">Nobel prizes in sciences awarded</div></div>
        </div>

        <h2>Physics</h2>
        <p>Physics is the branch of science that studies matter, energy, and the fundamental forces of nature. It ranges from the quantum behaviour of subatomic particles to the large-scale structure of the universe.</p>
        <h3>Key areas</h3>
        <ul>
            <li><strong>Classical Mechanics</strong> — motion, forces, and energy at human-observable scales (Newton's laws)</li>
            <li><strong>Electromagnetism</strong> — electricity, magnetism, and light as unified phenomena (Maxwell's equations)</li>
            <li><strong>Quantum Mechanics</strong> — behaviour of particles at atomic and subatomic scales</li>
            <li><strong>Thermodynamics</strong> — heat, temperature, and energy transfer</li>
            <li><strong>Relativity</strong> — Einstein's framework for space, time, and gravity</li>
        </ul>
        <div class="highlight-box"><p>"If you thought that science was certain — well, that is just an error on your part." — Richard Feynman</p></div>

        <h2>Chemistry</h2>
        <p>Chemistry investigates the composition, structure, properties, and transformations of matter. It bridges physics and biology, underpinning materials science, pharmacology, and environmental science.</p>
        <h3>Key branches</h3>
        <ul>
            <li><strong>Organic Chemistry</strong> — carbon-based compounds and reactions</li>
            <li><strong>Inorganic Chemistry</strong> — non-carbon compounds, metals, and minerals</li>
            <li><strong>Physical Chemistry</strong> — the physics of chemical systems (thermodynamics, kinetics)</li>
            <li><strong>Analytical Chemistry</strong> — identifying and quantifying chemical substances</li>
            <li><strong>Biochemistry</strong> — chemical processes within living organisms</li>
        </ul>

        <h2>Biology</h2>
        <p>Biology is the study of living organisms — their structure, function, growth, evolution, and interactions. It spans from molecular mechanisms inside cells to ecosystem dynamics at planetary scale.</p>
        <h3>Core disciplines</h3>
        <ul>
            <li><strong>Cell Biology</strong> — the structure and function of cells, the basic unit of life</li>
            <li><strong>Genetics &amp; Genomics</strong> — heredity, DNA, and gene expression</li>
            <li><strong>Ecology</strong> — relationships between organisms and their environment</li>
            <li><strong>Evolutionary Biology</strong> — how species change over time through natural selection</li>
            <li><strong>Neuroscience</strong> — the nervous system and the biological basis of behaviour</li>
        </ul>

        <h2>Earth Sciences</h2>
        <p>Earth sciences cover the physical, chemical, and biological processes shaping our planet — from plate tectonics and volcanology to atmospheric science and oceanography.</p>
        <ul>
            <li><strong>Geology</strong> — the solid Earth: rocks, minerals, and geological history</li>
            <li><strong>Meteorology</strong> — weather systems and atmospheric phenomena</li>
            <li><strong>Oceanography</strong> — the physical, chemical, and biological properties of the oceans</li>
            <li><strong>Climatology</strong> — long-term patterns of temperature, precipitation, and climate change</li>
        </ul>

        <h2>The Scientific Method</h2>
        <p>All scientific disciplines share a common methodology: observe a phenomenon, form a hypothesis, design an experiment to test it, collect and analyse data, and draw conclusions. Crucially, conclusions must be falsifiable — a hypothesis that cannot, in principle, be proven wrong is not scientific.</p>
        <div class="highlight-box"><p>"The first principle is that you must not fool yourself, and you are the easiest person to fool." — Richard Feynman</p></div>

        <p style="margin-top:2rem;">
            <a href="/technology" class="btn">Next: Technology &rarr;</a>
        </p>

    </div>
</main>
@endsection
