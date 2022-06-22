@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModal">New item</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Action</th>
                    </tr>
                    @foreach($menuItems as $item)
                        <tr>
                            <td>{{$item['name']}}</td>
                            <td>{{$item->parentName['name']}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalEdit_{{$item['id']}}">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalDelete_{{$item['id']}}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


    {{--Store Modal--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('store')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Parent</label>
                            <select name="parent" id="parent"  class="form-control">
                                <option value=""></option>
                                @foreach($menuItems as $parent)
                                    <option value="{{$parent['id']}}">{{$parent['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--End Store Modal--}}


    @foreach($menuItems as $item)
        {{--Edit Modal--}}
        <div class="modal fade" id="exampleModalEdit_{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditLabel_{{$item['id']}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('edit',$item['id'])}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$item['name']}}">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Parent</label>
                                <select name="parent" id="parent"  class="form-control">
                                    <option value=""></option>
                                    @foreach($menuItems as $parent)
                                    <option value="{{$parent['id']}}" @if($item['parent'] == $parent['id']) selected @endif>{{$parent['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    {{--Delete Modal--}}

        <div class="modal fade" id="exampleModalDelete_{{$item['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalDeleteLabel_{{$item['id']}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{route('delete', $item['id'])}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalDeleteLabel_{{$item['id']}}">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Sunteti sigur sa stergeti acest element ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--End Delete Modal--}}
    @endforeach

@endsection
