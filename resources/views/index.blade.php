@extends('layouts.app')

@section('test')

    <form>
        <div class="form-group col-md-6">
            <label for="name">name</label>
            <input type="name" class="form-control" id="exampleInputEmail1" placeholder="Name">
        </div>

        <div class="form-group col-md-6">
            <label for="inputCountry">Country</label>
            <select id="inputCountry" class="form-control">
                <option selected>Choose...</option>
                        <option></option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @stop
