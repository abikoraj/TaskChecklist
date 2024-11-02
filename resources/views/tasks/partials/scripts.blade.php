<script>
    // Toggle task status
    function toggleStatus(taskId) {
        let isChecked = document.getElementById(`statusSwitchCheck${taskId}`).checked;
        fetch(`/tasks/toggle-status/${taskId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    status: isChecked
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Update progress bar dynamically
                    document.querySelector('.progress-bar').style.width = data.completionPercentage + '%';
                    document.querySelector('.progress-bar').innerText = data.completionPercentage + '%';
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Edit task modal
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('edit-task')) {
            e.preventDefault();

            const taskId = e.target.getAttribute('data-id');

            fetch(`/tasks/edit/${taskId}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('edit-title').value = data.title;
                    document.getElementById('edit-description').value = data.description;

                    document.getElementById('editTaskForm').action = `/tasks/update/${taskId}`;
                })
                .catch(error => console.error('Error:', error));
        }
    });

    // Delete task with confirmation
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('delete-task')) {
            e.preventDefault();
            const deleteButton = e.target;

            Swal.fire({
                title: 'Do you want to delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = deleteButton.closest('form');
                    if (form) {
                        form.submit();
                    }
                }
            });
        }
    });
</script>
