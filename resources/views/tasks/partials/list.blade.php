<!-- Task Filter Dropdown -->
<div class="mt-4 d-flex justify-content-between align-items-center">
    <h3>Task List</h3>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown"
            aria-expanded="false">
            Filter Tasks
        </button>
        <ul class="dropdown-menu" aria-labelledby="filterDropdown">
            <li><a class="dropdown-item" href="?filter=all">All</a></li>
            <li><a class="dropdown-item" href="?filter=completed">Completed</a></li>
            <li><a class="dropdown-item" href="?filter=incomplete">Incomplete</a></li>
        </ul>
    </div>
</div>

<!-- Progress Bar -->
<div class="progress my-3">
    <div class="progress-bar" role="progressbar" style="width: {{ $completionPercentage ?? 0 }}%;"
        aria-valuenow="{{ $completionPercentage ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
        {{ $completionPercentage ?? 0 }}%
    </div>
</div>

<!-- Task List Table -->
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Is Completed</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="taskList">
        @foreach ($tasks as $task)
            <tr id="task-{{ $task->id }}">
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>
                    <form>
                        @csrf
                        <div class="form-check form-switch">
                            <input name="status" class="form-check-input" type="checkbox"
                                onchange="toggleStatus({{ $task->id }})" {{ $task->status == 1 ? 'checked' : '' }}
                                role="switch" id="statusSwitchCheck{{ $task->id }}">
                        </div>
                    </form>
                </td>
                <td class="d-flex justify-content-start align-items-center">
                    <button class="btn btn-warning btn-sm edit-task me-2" data-id="{{ $task->id }}"
                        data-bs-toggle="modal" data-bs-target="#editTaskModal">Edit
                    </button>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm delete-task">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
