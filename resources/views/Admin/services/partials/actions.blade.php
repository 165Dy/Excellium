<div class="btn-group">
    <button type="button" 
        class="btn btn-sm btn-primary dropdown-toggle" 
        data-bs-toggle="dropdown" 
        aria-expanded="false">
        Actions
    </button>
    <ul class="dropdown-menu">
        <li>
            <a href="#" class="dropdown-item btn-edit-service" data-id="{{ $service->id }}">
                <i class="bi bi-pencil-square"></i> Modifier
            </a>
        </li>
        <li>
            <a href="#" class="dropdown-item btn-delete-service" data-id="{{ $service->id }}">
                <i class="bi bi-trash"></i> Supprimer
            </a>
        </li>
    </ul>
</div> 