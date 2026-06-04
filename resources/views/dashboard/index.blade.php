@extends('layouts.app')
@section('title', 'My Dashboard')

@section('styles')
<style>
    .dash-wrap { padding: 3rem 2.5rem; max-width: 1200px; margin: 0 auto; }

    .dash-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .dash-title {
        font-family: 'Syne', sans-serif;
        font-size: 2.2rem;
        font-weight: 800;
        letter-spacing: -0.03em;
    }
    .dash-sub { color: var(--muted); font-size: 0.9rem; margin-top: 0.25rem; }

    /* STATS ROW */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1rem;
        margin-bottom: 2.5rem;
    }
    .stat-card {
        background: var(--glass);
        border: 1px solid var(--glass-border);
        border-radius: var(--r-lg);
        padding: 1.25rem 1.5rem;
        backdrop-filter: blur(12px);
    }
    .stat-label { font-size: 0.75rem; color: var(--muted); letter-spacing: 0.06em; text-transform: uppercase; margin-bottom: 0.5rem; }
    .stat-value {
        font-family: 'Syne', sans-serif;
        font-size: 2rem;
        font-weight: 800;
        letter-spacing: -0.02em;
    }
    .stat-value.c-accent { color: var(--accent); }
    .stat-value.c-accent2 { color: var(--accent2); }
    .stat-value.c-accent3 { color: var(--accent3); }

    /* ENROLLED TABLE */
    .section-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    .section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--glass-border);
    }

    .enrollment-list { display: flex; flex-direction: column; gap: 0.75rem; }

    .enrollment-row {
        background: var(--glass);
        border: 1px solid var(--glass-border);
        border-radius: var(--r-lg);
        padding: 1.25rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        backdrop-filter: blur(12px);
        transition: border-color 0.2s;
    }
    .enrollment-row:hover { border-color: rgba(255,255,255,0.14); }

    .enroll-icon {
        width: 44px; height: 44px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .enroll-info { flex: 1; min-width: 0; }
    .enroll-title {
        font-family: 'Syne', sans-serif;
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .enroll-meta { font-size: 0.78rem; color: var(--muted); display: flex; gap: 1rem; flex-wrap: wrap; }

    .enroll-status {
        flex-shrink: 0;
    }
    .status-badge {
        font-size: 0.72rem;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.3rem 0.75rem;
        border-radius: 100px;
    }
    .status-active    { background: rgba(79,217,200,0.12); color: var(--accent); }
    .status-completed { background: rgba(79,217,160,0.12); color: var(--success); }
    .status-paused    { background: rgba(255,193,94,0.12); color: #ffc15e; }
    .status-dropped   { background: rgba(255,107,122,0.12); color: var(--danger); }

    .enroll-actions { display: flex; gap: 0.5rem; flex-shrink: 0; }

    /* EDIT MODAL */
    .modal-overlay {
        position: fixed; inset: 0;
        background: rgba(2,4,8,0.7);
        backdrop-filter: blur(8px);
        z-index: 200;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.25s;
    }
    .modal-overlay.open { opacity: 1; pointer-events: all; }
    .modal {
        background: #0d1b2e;
        border: 1px solid var(--glass-border);
        border-radius: var(--r-lg);
        padding: 2rem;
        width: 100%;
        max-width: 480px;
        transform: translateY(20px);
        transition: transform 0.25s;
    }
    .modal-overlay.open .modal { transform: translateY(0); }
    .modal-title {
        font-family: 'Syne', sans-serif;
        font-size: 1.3rem;
        font-weight: 800;
        margin-bottom: 1.5rem;
    }
    .modal-actions { display: flex; gap: 0.75rem; justify-content: flex-end; margin-top: 1.5rem; }

    .empty-dash {
        text-align: center;
        padding: 4rem 2rem;
        color: var(--muted);
    }
    .empty-dash-icon { font-size: 3.5rem; margin-bottom: 1rem; }

    @media (max-width: 640px) {
        .dash-wrap { padding: 2rem 1.25rem; }
        .enroll-actions { flex-direction: column; }
        .enrollment-row { flex-wrap: wrap; }
    }
</style>
@endsection

@section('content')
<div class="dash-wrap">
    <div class="dash-header">
        <div>
            <div class="dash-title">Hello, {{ auth()->user()->name }}<span style="color:var(--accent)">.</span></div>
            <div class="dash-sub">Track and manage your enrolled STEM courses</div>
        </div>
        <a href="{{ url('/') }}" class="btn btn-primary">+ Enroll in More</a>
    </div>

    <!-- STATS -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label">Total Enrolled</div>
            <div class="stat-value c-accent">{{ $enrollments->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">In Progress</div>
            <div class="stat-value c-accent2">{{ $enrollments->where('status','active')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">Completed</div>
            <div class="stat-value c-accent3">{{ $enrollments->where('status','completed')->count() }}</div>
        </div>
    </div>

    <!-- ENROLLED COURSES -->
    <div class="section-title">My Courses</div>

    @if($enrollments->isEmpty())
    <div class="empty-dash">
        <div class="empty-dash-icon">🚀</div>
        <p style="font-size:1rem;margin-bottom:0.5rem;">No courses yet</p>
        <p style="font-size:0.875rem;">Browse and enroll in your first STEM course</p>
        <a href="{{ url('/') }}" class="btn btn-primary" style="margin-top:1.5rem;">Browse Courses</a>
    </div>
    @else
    <div class="enrollment-list">
        @foreach($enrollments as $enrollment)
        @php
            $icons = ['Science'=>'🔬','Technology'=>'💻','Engineering'=>'⚙️','Math'=>'📐'];
            $icon = $icons[$enrollment->course->category] ?? '📚';
        @endphp
        <div class="enrollment-row">
            <div class="enroll-icon cat-{{ $enrollment->course->category }}">{{ $icon }}</div>
            <div class="enroll-info">
                <div class="enroll-title">{{ $enrollment->course->title }}</div>
                <div class="enroll-meta">
                    <span>{{ $enrollment->course->category }}</span>
                    <span>{{ $enrollment->course->duration_weeks }}w</span>
                    <span>{{ ucfirst($enrollment->course->level) }}</span>
                    <span>Enrolled {{ $enrollment->created_at->format('M d, Y') }}</span>
                </div>
            </div>
            <div class="enroll-status">
                <span class="status-badge status-{{ $enrollment->status }}">{{ ucfirst($enrollment->status) }}</span>
            </div>
            <div class="enroll-actions">
                <button
                    class="btn btn-secondary"
                    style="padding:0.4rem 0.85rem;font-size:0.8rem;"
                    onclick="openEdit({{ $enrollment->id }}, '{{ $enrollment->status }}', '{{ addslashes($enrollment->notes ?? '') }}')"
                >Edit</button>
                <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Remove this course?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="padding:0.4rem 0.85rem;font-size:0.8rem;">Remove</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- EDIT MODAL -->
<div class="modal-overlay" id="editModal">
    <div class="modal">
        <div class="modal-title">Update Enrollment</div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Status</label>
                <select name="status" id="editStatus" class="form-select">
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="paused">Paused</option>
                    <option value="dropped">Dropped</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Notes (optional)</label>
                <textarea name="notes" id="editNotes" class="form-textarea" placeholder="Add personal notes about this course..."></textarea>
            </div>
            <div class="modal-actions">
                <button type="button" class="btn btn-ghost" onclick="closeEdit()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
function openEdit(id, status, notes) {
    document.getElementById('editForm').action = `/enrollments/${id}`;
    document.getElementById('editStatus').value = status;
    document.getElementById('editNotes').value = notes;
    document.getElementById('editModal').classList.add('open');
}
function closeEdit() {
    document.getElementById('editModal').classList.remove('open');
}
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) closeEdit();
});
</script>
@endsection
