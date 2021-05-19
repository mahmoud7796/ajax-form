@extends('layouts.app')

@section('form')

    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCountry">Country</label>
                <select id="inputCountry" class="form-control">
                    <option selected>Choose...</option>
                    @if($countries['data'] && $countries['data'] -> count()>0)
                    @foreach($countries['data'] as $country)
                    <option value="{{$country -> id}}">{{$country -> name}}</option>
                        @endforeach
                        @endif
                </select>
            </div>
        </div>

        <div id="stateShow" class="form-row hidden">
            <div class="form-group col-md-6">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control">
                    <option value='0' selected>Choose...</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    @stop
@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
           $('#inputCountry').change(function(){
               var id = $(this).val();
               var text = $(this).find("option:selected").text().trim(); //get text
               //Empty the States dropdown without first
               if(text == "USA"){
                   $('#stateShow').show();
                   $('#inputState').find('option').not(':first').remove();
                   //ajax request
                   $.ajax({
                       url: 'getState/'+id,
                       type:'get',
                       dataType: 'json',
                       success: function(response){
                           var len = 0;
                           if(response['data'] != null){
                               len = response['data'].length;
                           }
                           if(len > 0){
                               //Read data in the state option that related with country
                               for(var i=0;i<len;i++){
                                   var id = response['data'][i].id;
                                   var name = response['data'][i].name;
                                   var option = "<option value='"+id+"'>"+name+"</option>";
                                   $('#inputState').append(option);
                               }
                           }

                       }
                   });

               }else if(text == "australia"){
                   $('#stateShow').show();
                   $('#inputState').find('option').not(':first').remove();
                   //ajax request
                   $.ajax({
                       url: 'getState/'+id,
                       type:'get',
                       dataType: 'json',
                       success: function(response){
                           var len = 0;
                           if(response['data'] != null){
                               len = response['data'].length;
                           }
                           if(len > 0){
                               //Read data in the state option that related with country
                               for(var i=0;i<len;i++){
                                   var id = response['data'][i].id;
                                   var name = response['data'][i].name;
                                   var option = "<option value='"+id+"'>"+name+"</option>";
                                   $('#inputState').append(option);
                               }
                           }

                       }
                   });

               }else {
                   $('#stateShow').hide(); //hide
               }

           });
        });



    </script>

    @stop
