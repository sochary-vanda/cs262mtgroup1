@extends('layouts.app')
@section('title', 'Explore STEM Courses')

@section('styles')
<style>
    .hero {
        padding: 5rem 2.5rem 3rem;
        text-align: center;
        position: relative;
    }
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(79,217,200,0.1);
        border: 1px solid rgba(79,217,200,0.2);
        border-radius: 100px;
        padding: 0.35rem 1rem;
        font-size: 0.78rem;
        color: var(--accent);
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-weight: 500;
        margin-bottom: 1.5rem;
    }
    .hero-title {
        font-family: 'Syne', sans-serif;
        font-size: clamp(2.5rem, 6vw, 4.5rem);
        font-weight: 800;
        letter-spacing: -0.04em;
        line-height: 1.05;
        margin-bottom: 1.2rem;
    }
    .hero-title em {
        font-style: normal;
        color: transparent;
        -webkit-text-stroke: 1px rgba(255,255,255,0.35);
    }
    .hero-sub {
        color: var(--muted);
        font-size: 1.05rem;
        max-width: 520px;
        margin: 0 auto 2.5rem;
        line-height: 1.65;
    }

    /* FILTER BAR */
    .filter-bar {
        padding: 0 2.5rem;
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        margin-bottom: 2.5rem;
    }
    .filter-chip {
        padding: 0.4rem 1rem;
        border-radius: 100px;
        font-size: 0.8rem;
        font-weight: 500;
        cursor: pointer;
        border: 1px solid var(--glass-border);
        background: transparent;
        color: var(--muted);
        transition: all 0.2s;
        font-family: 'DM Sans', sans-serif;
        text-decoration: none;
    }
    .filter-chip:hover, .filter-chip.active {
        background: var(--glass);
        color: var(--text);
        border-color: rgba(255,255,255,0.15);
    }
    .filter-chip[data-cat="Science"].active { border-color: rgba(79,217,200,0.4); color: var(--accent); }
    .filter-chip[data-cat="Technology"].active { border-color: rgba(123,110,246,0.4); color: var(--accent2); }
    .filter-chip[data-cat="Engineering"].active { border-color: rgba(240,98,146,0.4); color: var(--accent3); }
    .filter-chip[data-cat="Math"].active { border-color: rgba(255,193,94,0.4); color: #ffc15e; }

    /* COURSE GRID */
    .courses-grid {
        padding: 0 2.5rem;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.25rem;
    }

    .course-card {
        background: var(--glass);
        border: 1px solid var(--glass-border);
        border-radius: var(--r-lg);
        backdrop-filter: blur(12px);
        overflow: hidden;
        transition: transform 0.25s, border-color 0.25s, box-shadow 0.25s;
        display: flex;
        flex-direction: column;
    }
    .course-card:hover {
        transform: translateY(-4px);
        border-color: rgba(255,255,255,0.14);
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .course-header {
        padding: 1.5rem 1.5rem 1rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .course-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .cat-Science    { background: rgba(79,217,200,0.12); }
    .cat-Technology { background: rgba(123,110,246,0.12); }
    .cat-Engineering{ background: rgba(240,98,146,0.12); }
    .cat-Math       { background: rgba(255,193,94,0.12); }

    .cat-badge {
        font-size: 0.7rem;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        padding: 0.3rem 0.7rem;
        border-radius: 100px;
    }
    .badge-Science    { background: rgba(79,217,200,0.12); color: var(--accent); }
    .badge-Technology { background: rgba(123,110,246,0.12); color: var(--accent2); }
    .badge-Engineering{ background: rgba(240,98,146,0.12); color: var(--accent3); }
    .badge-Math       { background: rgba(255,193,94,0.12); color: #ffc15e; }

    .course-body { padding: 0 1.5rem 1.5rem; flex: 1; }
    .course-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.05rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        letter-spacing: -0.01em;
        line-height: 1.3;
    }
    .course-desc {
        font-size: 0.845rem;
        color: var(--muted);
        line-height: 1.6;
        margin-bottom: 1.2rem;
    }

    .course-meta {
        display: flex;
        gap: 1rem;
        font-size: 0.78rem;
        color: var(--muted);
        margin-bottom: 1.2rem;
    }
    .course-meta span { display: flex; align-items: center; gap: 0.3rem; }

    .course-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--glass-border);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .course-price {
        font-family: 'Syne', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
    }
    .course-price.free { color: var(--success); }

    .enrolled-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        font-size: 0.78rem;
        color: var(--success);
        font-weight: 500;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--muted);
    }
    .empty-state-icon { font-size: 3rem; margin-bottom: 1rem; opacity: 0.5; }

    @media (max-width: 768px) {
        .hero { padding: 3rem 1.25rem 2rem; }
        .courses-grid, .filter-bar { padding: 0 1.25rem; }
    }
</style>
@endsection

@section('content')
<div class="hero">
    <div class="hero-badge">🔬 150+ STEM Courses Available</div>
    <h1 class="hero-title">
        Learn <em>Science</em>,<br>Master <em>Technology</em>
    </h1>
    <p class="hero-sub">
        Explore curated courses in Science, Technology, Engineering & Mathematics.
        Build skills that shape the future.
    </p>
    @guest
        <a href="{{ route('register') }}" class="btn btn-primary" style="font-size:1rem;padding:0.75rem 2rem;">
            Start Learning Free
        </a>
    @endguest
</div>

<div class="filter-bar">
    <a href="{{ url('/') }}" class="filter-chip {{ !request('category') ? 'active' : '' }}">All</a>
    @foreach(['Science','Technology','Engineering','Math'] as $cat)
        <a href="{{ url('/?category='.$cat) }}" class="filter-chip {{ request('category') === $cat ? 'active' : '' }}" data-cat="{{ $cat }}">{{ $cat }}</a>
    @endforeach
</div>

<div class="courses-grid">
    @forelse($courses as $course)
    @php
        $icons = ['Science'=>'🔬','Technology'=>'💻','Engineering'=>'⚙️','Math'=>'📐'];
        $icon = $icons[$course->category] ?? '📚';
        $isEnrolled = auth()->check() && $enrolledIds->contains($course->id);
    @endphp
    <div class="course-card" data-category="{{ $course->category }}">
        <div class="course-header">
            <div class="course-icon cat-{{ $course->category }}">{{ $icon }}</div>
            <span class="cat-badge badge-{{ $course->category }}">{{ $course->category }}</span>
        </div>
        <div class="course-body">
            <div class="course-title">{{ $course->title }}</div>
            <div class="course-desc">{{ Str::limit($course->description, 100) }}</div>
            <div class="course-meta">
                <span>📅 {{ $course->duration_weeks }} weeks</span>
                <span>📊 {{ ucfirst($course->level) }}</span>
                <span>👥 {{ $course->enrollments_count ?? 0 }} enrolled</span>
            </div>
        </div>
        <div class="course-footer">
            <div class="course-price {{ $course->price == 0 ? 'free' : '' }}">
                {{ $course->price == 0 ? 'Free' : '$'.number_format($course->price, 2) }}
            </div>
            @if($isEnrolled)
                <span class="enrolled-badge">✓ Enrolled</span>
            @elseif(auth()->check())
                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                    <button type="submit" class="btn btn-primary" style="padding:0.4rem 1rem;font-size:0.82rem;">
                        Enroll Now
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost" style="padding:0.4rem 1rem;font-size:0.82rem;">
                    Log in to Enroll
                </a>
            @endif
        </div>
    </div>
    @empty
    <div class="empty-state" style="grid-column:1/-1;">
        <div class="empty-state-icon">🔍</div>
        <p>No courses found in this category.</p>
    </div>
    @endforelse
</div>
@endsection
