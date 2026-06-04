@extends('layout')
@section('title', 'Mathematics — STEM Hub')

@section('content')
<main>
    <div class="article-header">
        <a href="/" class="back">&larr; All fields</a>
        <span class="card-tag" style="background:var(--tag-math);color:#5b1d7a;display:inline-block;font-family:var(--mono);font-size:0.65rem;letter-spacing:0.08em;text-transform:uppercase;padding:3px 8px;border-radius:3px;margin-bottom:1rem;">Mathematics</span>
        <h1>The universal language of pattern</h1>
        <p class="article-meta">Algebra · Calculus · Statistics · Discrete Maths · Logic</p>
    </div>

    <div class="article-body">

        <p>Mathematics is the abstract science of number, quantity, structure, and space. Unlike other STEM disciplines, it does not rely on physical experiments — mathematical truths are established through logical proof. Yet it is indispensable to every other field in STEM.</p>

        <div class="stat-row">
            <div class="stat"><div class="stat-num">∞</div><div class="stat-desc">Unsolved problems remain</div></div>
            <div class="stat"><div class="stat-num">~300</div><div class="stat-desc">Million known prime numbers</div></div>
            <div class="stat"><div class="stat-num">1900</div><div class="stat-desc">Hilbert's 23 problems posed</div></div>
        </div>

        <h2>Algebra</h2>
        <p>Algebra is the branch of mathematics dealing with symbols and the rules for manipulating those symbols — generalising arithmetic to solve equations and study structures.</p>
        <h3>Key areas</h3>
        <ul>
            <li><strong>Elementary Algebra</strong> — variables, equations, polynomials, factoring</li>
            <li><strong>Linear Algebra</strong> — vectors, matrices, linear transformations — essential for physics, graphics, and machine learning</li>
            <li><strong>Abstract Algebra</strong> — groups, rings, and fields — the deep structure of mathematical objects</li>
            <li><strong>Number Theory</strong> — properties of integers; underpins modern cryptography</li>
        </ul>
        <div class="highlight-box"><p>"Mathematics is the queen of the sciences and number theory is the queen of mathematics." — Carl Friedrich Gauss</p></div>

        <h2>Calculus &amp; Analysis</h2>
        <p>Calculus, developed independently by Newton and Leibniz in the 17th century, is the mathematics of continuous change. It underpins classical mechanics, electromagnetism, economics, and almost every physical model.</p>
        <ul>
            <li><strong>Differential Calculus</strong> — rates of change, derivatives, optimisation</li>
            <li><strong>Integral Calculus</strong> — areas, volumes, accumulation, the Fundamental Theorem</li>
            <li><strong>Multivariable Calculus</strong> — extending derivatives and integrals to higher dimensions</li>
            <li><strong>Differential Equations</strong> — modelling systems that evolve over time (physics, biology, economics)</li>
            <li><strong>Real &amp; Complex Analysis</strong> — rigorous foundations of calculus, Fourier series, complex functions</li>
        </ul>

        <h2>Statistics &amp; Probability</h2>
        <p>Statistics is the science of data: collecting, analysing, interpreting, and presenting it. Probability provides the mathematical framework for reasoning under uncertainty.</p>
        <ul>
            <li><strong>Descriptive Statistics</strong> — mean, median, variance, distributions</li>
            <li><strong>Inferential Statistics</strong> — hypothesis testing, confidence intervals, p-values</li>
            <li><strong>Probability Theory</strong> — random variables, expected value, Bayes' theorem</li>
            <li><strong>Regression Analysis</strong> — modelling relationships between variables</li>
            <li><strong>Bayesian Statistics</strong> — updating beliefs in light of new evidence</li>
        </ul>

        <h2>Discrete Mathematics</h2>
        <p>Discrete mathematics studies countable, distinct structures — the mathematical language of computer science. It underpins algorithm design, network theory, cryptography, and logic circuits.</p>
        <ul>
            <li><strong>Graph Theory</strong> — networks of nodes and edges; models roads, social networks, circuits</li>
            <li><strong>Combinatorics</strong> — counting, permutations, combinations</li>
            <li><strong>Boolean Logic</strong> — the algebra of true/false; the basis of digital circuits</li>
            <li><strong>Set Theory</strong> — the foundation of all modern mathematics</li>
            <li><strong>Formal Logic &amp; Proof Theory</strong> — mathematical reasoning and proof systems</li>
        </ul>

        <h2>Geometry &amp; Topology</h2>
        <p>Geometry studies shapes, sizes, and the properties of space. Topology studies the fundamental properties of spaces that are preserved under continuous deformations — what remains when you bend but do not break.</p>
        <ul>
            <li><strong>Euclidean Geometry</strong> — points, lines, angles, circles, and polyhedra</li>
            <li><strong>Differential Geometry</strong> — curves and surfaces using calculus; used in general relativity</li>
            <li><strong>Algebraic Geometry</strong> — geometric solutions of algebraic equations</li>
            <li><strong>Topology</strong> — the study of spaces up to continuous deformation</li>
        </ul>
        <div class="highlight-box"><p>"Pure mathematics is, in its way, the poetry of logical ideas." — Albert Einstein</p></div>

        <p style="margin-top:2rem;">
            <a href="/science" class="btn">&larr; Back to Science</a>
        </p>

    </div>
</main>
@endsection
