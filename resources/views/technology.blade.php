@extends('layout')
@section('title', 'Technology — STEM Hub')

@section('content')
<main>
    <div class="article-header">
        <a href="/" class="back">&larr; All fields</a>
        <span class="card-tag" style="background:var(--tag-tech);color:#1d4d7a;display:inline-block;font-family:var(--mono);font-size:0.65rem;letter-spacing:0.08em;text-transform:uppercase;padding:3px 8px;border-radius:3px;margin-bottom:1rem;">Technology</span>
        <h1>Tools that transform how we live</h1>
        <p class="article-meta">Computing · AI · Networks · Cybersecurity · Data</p>
    </div>

    <div class="article-body">

        <p>Technology is the application of scientific knowledge to create tools, systems, and processes that solve practical problems. In the modern era, it is primarily concerned with computing, information systems, and digital infrastructure.</p>

        <div class="stat-row">
            <div class="stat"><div class="stat-num">5.4B</div><div class="stat-desc">Internet users worldwide</div></div>
            <div class="stat"><div class="stat-num">120B</div><div class="stat-desc">Lines of code in modern OS</div></div>
            <div class="stat"><div class="stat-num">$5T+</div><div class="stat-desc">Global tech industry value</div></div>
        </div>

        <h2>Computer Science fundamentals</h2>
        <p>Computer science is the theoretical backbone of technology. It deals with algorithms, data structures, computation theory, and programming languages — the tools that make software possible.</p>
        <h3>Core topics</h3>
        <ul>
            <li><strong>Algorithms &amp; Data Structures</strong> — sorting, searching, graphs, trees, hash tables</li>
            <li><strong>Operating Systems</strong> — process management, memory, file systems, scheduling</li>
            <li><strong>Computer Architecture</strong> — how CPUs, memory, and I/O systems work together</li>
            <li><strong>Programming Paradigms</strong> — procedural, object-oriented, functional, declarative</li>
            <li><strong>Databases</strong> — relational (SQL), document stores, graph databases</li>
        </ul>
        <div class="highlight-box"><p>"Any sufficiently advanced technology is indistinguishable from magic." — Arthur C. Clarke</p></div>

        <h2>Artificial Intelligence &amp; Machine Learning</h2>
        <p>AI is one of the most transformative technologies of the 21st century. Machine learning systems learn patterns from data, enabling applications from image recognition to natural language processing.</p>
        <h3>Key concepts</h3>
        <ul>
            <li><strong>Supervised Learning</strong> — training on labelled data to make predictions</li>
            <li><strong>Neural Networks &amp; Deep Learning</strong> — layered architectures inspired by the brain</li>
            <li><strong>Natural Language Processing</strong> — enabling machines to understand and generate text</li>
            <li><strong>Computer Vision</strong> — teaching machines to interpret visual information</li>
            <li><strong>Reinforcement Learning</strong> — agents learning through reward and penalty</li>
        </ul>

        <h2>Networking &amp; the Internet</h2>
        <p>The internet is arguably the most important technological infrastructure ever built — a global network of billions of devices communicating through standardised protocols.</p>
        <ul>
            <li><strong>TCP/IP</strong> — the foundational protocol suite of the internet</li>
            <li><strong>DNS</strong> — the system that translates domain names to IP addresses</li>
            <li><strong>HTTP/HTTPS</strong> — the protocols powering the World Wide Web</li>
            <li><strong>Cloud Computing</strong> — on-demand access to computing resources over the network</li>
            <li><strong>5G &amp; IoT</strong> — high-speed wireless networks connecting physical devices</li>
        </ul>

        <h2>Cybersecurity</h2>
        <p>As our reliance on digital systems grows, so does the importance of protecting them. Cybersecurity encompasses the practices, technologies, and processes that guard systems against attack.</p>
        <ul>
            <li><strong>Cryptography</strong> — encoding information to protect confidentiality and integrity</li>
            <li><strong>Network Security</strong> — firewalls, intrusion detection, VPNs</li>
            <li><strong>Application Security</strong> — secure coding practices, vulnerability assessment</li>
            <li><strong>Ethical Hacking</strong> — authorised penetration testing to find weaknesses before attackers do</li>
        </ul>

        <h2>Emerging technologies</h2>
        <p>The frontier of technology is constantly advancing. Several areas are poised to reshape industries over the coming decade:</p>
        <ul>
            <li><strong>Quantum Computing</strong> — harnessing quantum mechanics for exponentially faster computation</li>
            <li><strong>Blockchain</strong> — distributed, immutable ledgers enabling trustless transactions</li>
            <li><strong>Augmented &amp; Virtual Reality</strong> — overlaying or replacing physical reality with digital content</li>
            <li><strong>Biotechnology interfaces</strong> — brain-computer interfaces and synthetic biology</li>
        </ul>
        <div class="highlight-box"><p>"Software is eating the world." — Marc Andreessen</p></div>

        <p style="margin-top:2rem;">
            <a href="/engineering" class="btn">Next: Engineering &rarr;</a>
        </p>

    </div>
</main>
@endsection
