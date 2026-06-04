@extends('layout')
@section('title', 'Engineering — STEM Hub')

@section('content')
<main>
    <div class="article-header">
        <a href="/" class="back">&larr; All fields</a>
        <span class="card-tag" style="background:var(--tag-eng);color:#7a4d1d;display:inline-block;font-family:var(--mono);font-size:0.65rem;letter-spacing:0.08em;text-transform:uppercase;padding:3px 8px;border-radius:3px;margin-bottom:1rem;">Engineering</span>
        <h1>Design, build, test, repeat</h1>
        <p class="article-meta">Civil · Mechanical · Electrical · Software · Chemical</p>
    </div>

    <div class="article-body">

        <p>Engineering is the application of science and mathematics to design and build systems, structures, machines, and processes. Where scientists ask <em>why</em>, engineers ask <em>how</em> — and then they build it.</p>

        <div class="stat-row">
            <div class="stat"><div class="stat-num">650K+</div><div class="stat-desc">Engineering graduates per year (US)</div></div>
            <div class="stat"><div class="stat-num">$100K+</div><div class="stat-desc">Median engineer salary (US)</div></div>
            <div class="stat"><div class="stat-num">40%</div><div class="stat-desc">Of Fortune 500 CEOs hold engineering degrees</div></div>
        </div>

        <h2>Civil Engineering</h2>
        <p>Civil engineers design and oversee the construction of the built environment: roads, bridges, dams, tunnels, water systems, and urban infrastructure. It is one of the oldest engineering disciplines, stretching back to ancient Rome and Egypt.</p>
        <h3>Key sub-fields</h3>
        <ul>
            <li><strong>Structural Engineering</strong> — ensuring buildings and bridges can bear loads safely</li>
            <li><strong>Geotechnical Engineering</strong> — foundations, soil mechanics, earthworks</li>
            <li><strong>Transportation Engineering</strong> — roads, rail, airports, and traffic systems</li>
            <li><strong>Environmental Engineering</strong> — clean water, waste treatment, pollution control</li>
            <li><strong>Urban Planning</strong> — designing liveable, sustainable cities</li>
        </ul>
        <div class="highlight-box"><p>"Engineering is the art of directing the great sources of power in nature for the use and convenience of man." — Thomas Tredgold</p></div>

        <h2>Mechanical Engineering</h2>
        <p>Mechanical engineering deals with the design, analysis, manufacturing, and maintenance of mechanical systems — anything that moves. From car engines to turbines to medical devices, it is one of the broadest engineering disciplines.</p>
        <ul>
            <li><strong>Thermodynamics &amp; Heat Transfer</strong> — engines, HVAC, power plants</li>
            <li><strong>Fluid Mechanics</strong> — pumps, turbines, aerodynamics</li>
            <li><strong>Manufacturing &amp; Materials</strong> — machining, casting, composite materials</li>
            <li><strong>Robotics &amp; Mechatronics</strong> — systems combining mechanics, electronics, and software</li>
            <li><strong>CAD/CAM</strong> — computer-aided design and manufacturing</li>
        </ul>

        <h2>Electrical Engineering</h2>
        <p>Electrical engineers work with electricity, electronics, and electromagnetism. The discipline spans from power grids delivering electricity to homes to the microchips inside smartphones.</p>
        <ul>
            <li><strong>Power Systems</strong> — generation, transmission, and distribution of electricity</li>
            <li><strong>Electronics</strong> — circuit design, semiconductors, integrated circuits</li>
            <li><strong>Signal Processing</strong> — analysing and manipulating audio, video, and sensor data</li>
            <li><strong>Control Systems</strong> — feedback loops and automation</li>
            <li><strong>Telecommunications</strong> — wireless systems, antennas, fibre optics</li>
        </ul>

        <h2>Software Engineering</h2>
        <p>Software engineering applies engineering principles to the development of software. It is distinct from computer science in that it focuses on the process of building reliable, scalable, and maintainable systems in production.</p>
        <ul>
            <li><strong>Requirements Engineering</strong> — understanding what a system needs to do</li>
            <li><strong>System Design &amp; Architecture</strong> — structuring large, complex software systems</li>
            <li><strong>Testing &amp; Quality Assurance</strong> — unit tests, integration tests, CI/CD pipelines</li>
            <li><strong>DevOps</strong> — culture and tools that bridge development and operations</li>
            <li><strong>Agile &amp; Scrum</strong> — iterative, collaborative development methodologies</li>
        </ul>

        <h2>Chemical Engineering</h2>
        <p>Chemical engineers design processes that transform raw materials into useful products — fuels, pharmaceuticals, plastics, food, and more. They operate at the intersection of chemistry, physics, and economics.</p>
        <ul>
            <li><strong>Process Design</strong> — designing reactors, distillation columns, heat exchangers</li>
            <li><strong>Biochemical Engineering</strong> — fermentation, bioprocessing, pharmaceutical manufacturing</li>
            <li><strong>Environmental Engineering</strong> — reducing industrial waste and emissions</li>
            <li><strong>Materials Processing</strong> — polymers, ceramics, nanomaterials</li>
        </ul>
        <div class="highlight-box"><p>"The scientist discovers a new type of material or energy and the engineer discovers a new use for it." — Gordon Lindsay Glegg</p></div>

        <p style="margin-top:2rem;">
            <a href="/mathematics" class="btn">Next: Mathematics &rarr;</a>
        </p>

    </div>
</main>
@endsection
