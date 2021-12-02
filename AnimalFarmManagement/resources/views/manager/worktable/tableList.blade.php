<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


<style>
    .right {
        float: right;
    }

    .center {
        text-align: center;
    }

    .left {
        text-align: left;
    }

    .greeny {
        background-color: green;
        color: white;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .blue {
        background-color: rgb(17, 175, 248);
        color: rgb(0, 0, 0);
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .redy {
        background-color: rgb(248, 17, 17);
        color: rgb(255, 255, 255);
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .yelow {
        background-color: rgb(239, 255, 21);
        color: rgb(0, 0, 0);
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .clearfix {
        overflow: auto;
    }

    .grid-container {
        display: grid;
        grid-template-columns: auto auto auto auto auto;
        padding: 10px;
    }

    .grid-item {
        padding: 5px;
        text-align: left;
    }
</style>
</head>

</html>


<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="table-responsive">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="float:right;">
                                                        Search / Download
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                    @csrf
                                                    <div class="grid-container">
                                                        <div class="grid-item">
                                                            {!! Form::open(['route' => 'manager.worktable.searchWorktable', 'method' => 'get'])!!}

                                                            Date From:<br>
                                                            <input type="date" name="date_from" id="date_from"><br><br>
                                                            Date Until:<br>
                                                            <input type="date" name="date_until" id="date_until"><br>

                                                        </div>
                                                        <div class="grid-item">
                                                            <!-- Created Date After:<br>
                                                            <input type="date" name="created_after" id="created_after"><br><br>
                                                            Created Date Before:<br>
                                                            <input type="date" name="created_before" id="created_before"><br> -->
                                                        </div>
                                                        <div class="grid-item">
                                                            Staff:
                                                            <select name="staff_id" id="staff_id" class="form control input -sm">
                                                                <option value="">--Select Staff--</option>
                                                                @foreach ($staffList as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="grid-item">

                                                        </div>
                                                        <div class="grid-item">
                                                            {{ Form::Submit('Search',['class' => 'btn btn-primary'])}}<br><br>
                                                            <a class="greeny" href="{{ route('manager.worktable.downloadExcel') }}" class="btn btn-success" title="Download as excel">Export to Excel</a><br><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <table id="editable" class="table table-bordered table-striped">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <!-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Check
                                                </th> -->
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date From
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date Until
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Staff
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Animals need to check
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Details
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Created Date
                                                </th>
                                                @if((Auth::user()->team_user && Auth::user()->team_user->role == 'admin')||!Auth::user()->team_user)
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action
                                                </th>
                                                @endif
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($workTable)
                                            @foreach($workTable as $work)
                                            <tr>
                                                <!-- <td class="px-6 py-4 whitespace-nowrap">
                                                    <input type="checkbox">
                                                </td> -->
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $work -> id }}
                                                        </div>
                                                    </div>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div>
                                                        {{ $work -> date_from }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $work -> date_until }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $work -> manager ? $work -> manager-> name : ''}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $work -> animal_tag() }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $work -> details }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($work -> created_at)->format('d/m/Y') }}
                                                </td>
                                                <td>
                                                    <form id="form{{ $work->id }}" action="{{ route('manager.worktable.deleteTable', [$work->id]) }}" method="POST">
                                                        @if((Auth::user()->team_user && Auth::user()->team_user->role == 'admin')||!Auth::user()->team_user)
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('manager.worktable.deleteTable', [$work->id]) }}"></a>
                                                        <button onclick="confirmation('{{$work->id}}')" class="redy">Delete</button>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function confirmation(worktable_id) {
            event.preventDefault();
            var answer = confirm('Are you sure you want to delete?');
            if (answer) {
                document.getElementById('form' + worktable_id).submit();
            } else {
                alert("Cancelled the delete!")
            }
        }
    </script>

</x-app-layout>