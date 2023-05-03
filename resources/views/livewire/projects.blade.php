<div>
    @include('livewire.helpermodal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>
                    Projects
                    <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                        data-bs-target="#createProjectModal">
                        Add new project
                    </button>
                    <input type="search" wire:model="search" class="form-contro float-end mx-2" style="width: 200px"
                        placeholder="Search">
                </h4>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                @forelse($projects as $project)
                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $project->name }}
                            <!-- Delete Project Button -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteProjectModal"
                                wire:click="deleteProject({{ $project->id }})" class="btn btn-danger me-1 float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                </svg>
                            </button>
                            <!-- Edit Project Button -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#updateProjectModal"
                                wire:click="editProject({{ $project->id }})" class="btn btn-primary me-1 float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </button>
                            <!-- Log time -->
                            <button type="button" data-bs-toggle="modal" data-bs-target="#timerModal"
                                class="btn btn-success me-1 float-end" wire:click="addTimer({{ $project->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                    <path
                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                        <div class="card-body">
                            @if(!empty($project->timers[0]))
                            <table class="table">
                                <tr>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Start at</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                @forelse($project->timers  as $time)
                                    <tr>
                                        <td>{{ $time->name }}</td>
                                        <td>{{ $time->start_at }}</td>
                                        <td>
                                            <div>
                                                @if ($time->stopped_at == '')
                                                    <span id="timer_{{ $time->id }}"> . </span>
                                                    <!-- Stop timer -->
                                                    <button type="button" class="btn btn-secondary"
                                                        wire:click="stopTimeLog({{ $time->id }})">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-stop-btn"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M6.5 5A1.5 1.5 0 0 0 5 6.5v3A1.5 1.5 0 0 0 6.5 11h3A1.5 1.5 0 0 0 11 9.5v-3A1.5 1.5 0 0 0 9.5 5h-3z" />
                                                            <path
                                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <div>
                                                        {{ gmdate("H:i:s", $time->logged_time)   }}
                                                    </div>
                                                @endif

                                            </div>
                                        </td>
                                        <td>
                                            <!-- Delete time logged -->
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#deleteTimeModal"
                                                wire:click="deleteTimeLog({{ $time->id }})"
                                                class="btn btn-danger me-1 float-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x-fill" viewBox="0 0 16 16">
                                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM6.854 7.146 8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 1 1 .708-.708z"/>
                                                  </svg>
                                            </button>

                                            <!-- Edit Time Logged -->
                                            <button type="button" data-bs-toggle="modal"
                                                data-bs-target="#updateTimeModal"
                                                wire:click="editTimeLogged({{ $time->id }})" 
                                                class="btn btn-info me-1 float-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                  </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </table>
                            @else
                                <p>Non logged time</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p>Add a new project to log time.</p>
                @endforelse

            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-12">
                <div class="mt-3">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
