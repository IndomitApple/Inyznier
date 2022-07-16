<!-- Modal -->
<div class="modal fade" id="exampleModal{{$pet->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dane zwierzęcia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><img src="https://twojlekarzprofile.s3.eu-central-1.amazonaws.com/images/{{$pet->image}}" class="table-user-thumb" alt="photo" width="200"></p>
                <p class="badge badge-pill badge-light-blue">{{$pet->breed->breed}}</p>
                <p>Imię: {{$pet->name}}</p>
                <p>Data urodzenia: {{$pet->date_of_birth}}</p>
                @if(@$pet->is_male==1)
                    <p>Płeć: Samiec</p>
                @else
                    <p>Płeć: Samica</p>
                @endif
                <p>Waga (kg): {{$pet->weight}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
            </div>
        </div>
    </div>
</div>
