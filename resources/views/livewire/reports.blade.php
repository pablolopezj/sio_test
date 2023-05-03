<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Reports</h4>

            </div>
        </div>
        <hr />

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Total by Day</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->username }}</td>
                            <td>{{ $project->date }}</td>
                            <td> {{  gmdate("H:i:s", $project->tiempo_total)   }} </td>
                        </tr>    
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Total by Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($logmonth as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->username }}</td>
                            <td>{{ $project->date }}</td>
                            <td> {{  gmdate("H:i:s", $project->tiempo_total)   }} </td>
                        </tr>    
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>
