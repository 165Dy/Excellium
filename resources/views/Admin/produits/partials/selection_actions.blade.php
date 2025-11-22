<div class="btn-group">
    <button type="button" 
        class="btn btn-sm btn-primary dropdown-toggle" 
        data-bs-toggle="dropdown" 
        aria-expanded="false">
        Actions
    </button>
    <ul class="dropdown-menu">
        <li>
            <a href="#" class="dropdown-item btn-change-statut-selection" data-id="{{ $up->id }}" data-current-statut="{{ $up->statut ?? 'en_attente' }}">
                <i class="bi bi-arrow-repeat"></i> Changer le statut
            </a>
        </li>
        <li>
            <a href="#" class="dropdown-item btn-delete-selection" data-id="{{ $up->id }}">
                <i class="bi bi-trash"></i> Supprimer
            </a>
        </li>
    </ul>
</div>

