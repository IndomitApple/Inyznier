@if(count($bookings)>0)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{route('prescription')}}" method="post">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Recepta i zalecenia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="app">
                        <input type="hidden" name="user_id" value="{{$booking->user_id}}">
                        <input type="hidden" name="pet_id" value="{{$booking->pet_id}}">
                        <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
                        <input type="hidden" name="date" value="{{$booking->date}}">
                        <div class="form-group">
                            <label>Rozpoznanie choroby</label>
                            <input type="text" name="name_of_disease" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Objawy</label>
                            <textarea name="symptoms" class="form-control" placeholder="Wypisz objawy pacjenta" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Lekarstwa</label>

                            <add-btn></add-btn>
                        </div>
                        <div class="form-group">
                            <label>Stosowanie lekarstw</label>
                            <textarea name="procedure_to_use_medicine" class="form-control" placeholder="Dawkowanie lekarstw" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Dodatkowe informacje</label>
                            <textarea name="feedback" class="form-control" placeholder="Dodatkowe informacje o pacjencie" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Zapisz</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif
