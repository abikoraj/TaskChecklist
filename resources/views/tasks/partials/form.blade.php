<!-- Task Creation Form -->
<h3>Add New Task</h3>
<form action="{{ route('tasks.store') }}" method="POST" id="taskForm">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Task Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Task</button>
</form>