<div class="card">
    @section('select_appointment', 'active')
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Add Appointment</h4>
        <div> <a href="{{ url('admin/appointments') }}"> <button class="btn btn-light"> <i class="fa fa-arrow-left"></i>
                    Back</button></a></div>
    </div>
    <div class="card-body">

        <form  wire:submit.prevent="createAppointment">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="category_name" class="control-label mb-1">Client</label>
                        <select name=""  wire:model.defer="state.client" id="" class="form-control shadow-none">
                            <option value="0">Select Client</option>
                            @foreach ($clients as $client)
                                
                            <option value="{{$client->id}}" >{{$client->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">Date</label>
                        <input id="date" name="date" type="date"
                        wire:model.defer="state.date"
                            class="form-control shadow-none cc-name valid" placeholder="Please enter slug">

                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="image" class="control-label mb-1">Time</label>
                        <input id="time" name="time" type="time" class="form-control shadow-none"
                        wire:model.defer="state.time">

                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="image" class="control-label mb-1"> Note</label>
                        <textarea name="note" class="form-control shadow-none" wire:model.defer="state.note"></textarea>
                    </div>
                </div>
            </div>

            <div>
                <button id="" type="submit" class="btn btn-md btn-success ">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
