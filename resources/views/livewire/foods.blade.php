<div class="container">
    <div class="row">
        <div class="col-md-6 d-flex">
            <input type="text" wire:model="search_label" class="form-control">
            <button wire:click="search">Search</button>
        </div>
        <div class="col-md-12 mt-5">
            <table class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Description</th>
                        <th>Base Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listFiltered as $l)
                        <tr>
                            <td>{{$l['id']}}</td>
                            <td>{{$l['description']}}</td>
                            <td>{{$l['base_qty']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>