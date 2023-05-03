<!-- Create new Project Modal -->
<div wire:ignore.self class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createProjectModalLabel">Create new project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="saveProject">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name: </label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Time assigned in hrs: </label>
                        <input type="text" wire:model="assigned_time" class="form-control">
                        @error('assigned_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Update Projects Modal -->
<div wire:ignore.self class="modal fade" id="updateProjectModal" tabindex="-1"
    aria-labelledby="updateProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateProjectModalLabel">Edit project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateProject">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name: </label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Time assigned in hrs: </label>
                        <input type="text" wire:model="assigned_time" class="form-control">
                        @error('assigned_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Project Modal -->
<div wire:ignore.self class="modal fade" id="deleteProjectModal" tabindex="-1"
    aria-labelledby="deleteProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteProjectModalLabel">Delete project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyProject">
                <div class="modal-body">
                    <p>Are you sure you want to delete this project ? </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Yes!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Timmer Modal -->
<div wire:ignore.self class="modal fade" id="timerModal" tabindex="-1" aria-labelledby="timerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="timerModalLabel">Log Time</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="initializeTimer">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name: </label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Start</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete timer modal -->
<div wire:ignore.self class="modal fade" id="deleteTimeModal" tabindex="-1" aria-labelledby="deleteTimeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteTimeModalModalLabel">Delete Log</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyTimeLog">
                <div class="modal-body">
                    <p>Are you sure you want to delete this log</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Yes!</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Update Time Modal -->
<div wire:ignore.self class="modal fade" id="updateTimeModal" tabindex="-1"
    aria-labelledby="updateTimeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateTimeModalLabel">Change time</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateTime">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Time: </label>
                        <input type="text" wire:model="logged_time" class="form-control">
                        @error('logged_time')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>