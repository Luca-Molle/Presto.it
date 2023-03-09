<div class="card-body bg-dark mt-5">
    <p class="p-3 text-white fw-bold">Confermi l'eliminazione?</p>
    <button class="btn btn-sm btn-outline-presto">Annulla</button>
    <button class="btn btn-sm btn-danger" wire:click="destroy({{ $announcement->id }})" >Elimina</button>
</div>

