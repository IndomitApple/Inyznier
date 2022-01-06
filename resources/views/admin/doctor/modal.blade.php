<!-- Modal -->
<div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dane lekarza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt="photo" width="200"></p>
                <p class="badge badge-pill badge-dark">Rola: {{__($user->role->name)}}</p>
                <p>Imię i nazwisko: {{$user->name}}</p>
                <p>E-mail: {{$user->email}}</p>
                <p>Adres: {{$user->address}}</p>
                <p>Numer telefonu: {{$user->phone_number}}</p>
                <p>Płeć: {{$user->gender}}</p>
                <p>Specjalizacja: {{$user->department}}</p>
                <p>Tytuł: {{$user->education}}</p>
                <p>O mnie: {{$user->description}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>
