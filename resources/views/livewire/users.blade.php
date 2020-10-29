@if($action == '')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right mt-5">
                <button class="btn btn-success btn-sm" wire:click="add">Add</button>
            </div>
            <div class="col-md-12 mt-1">
                <table class="table table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm" wire:click="edit({{$u->id}})">Edit</button>
                                    <button class="btn btn-danger btn-sm" wire:click="remove({{$u->id}})">Remove</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endif

@if($action == 'add')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-right">
                <button wire:click="index">X</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-1">
                <input type="text" class="form-control" wire:model="name" placeholder="Type your name..." />
            </div>
            <div class="col-md-4 mt-1">
                <input type="email" class="form-control" wire:model="email" placeholder="Type your email..." />
            </div>
            <div class="col-md-4 mt-1">
                <input type="password" class="form-control" wire:model="password" placeholder="Type your password..." />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-1 text-right">
                <button class="btn btn-success btn-sm" wire:click="save">Save</button>
            </div>
        </div>
    </div>
@endif

@if($action == 'edit')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5 text-right">
                <button wire:click="index">X</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-1">
                <input type="text" class="form-control" wire:model="name" placeholder="Type your name..." />
            </div>
            <div class="col-md-4 mt-1">
                <input type="email" class="form-control" wire:model="email" placeholder="Type your email..." />
            </div>
            <div class="col-md-4 mt-1">
                <input type="password" class="form-control" wire:model="password" placeholder="Type your password..." />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-1 text-right">
                <button class="btn btn-success btn-sm" wire:click="update">Save</button>
            </div>
        </div>
    </div>
@endif