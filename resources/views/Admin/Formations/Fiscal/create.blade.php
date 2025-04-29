@extends('layouts.admin')
@section('create_fiscal')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Ajouter une Formation en Fisacalité</h2>
                    <small class="text-body float-end">Merged input group</small>
                </div>
                <div class="card-body">
                    <form>
                        <div class="input-group input-group-merge mb-6">
                            <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                    class="icon-base ri ri-user-line"></i></span>
                            <div class="form-floating form-floating-outline">
                                <input type="text" class="form-control" id="basic-icon-default-fullname"
                                    placeholder="John Doe" aria-label="John Doe"
                                    aria-describedby="basic-icon-default-fullname2" />
                                <label for="basic-icon-default-fullname">Full Name</label>
                            </div>
                        </div>
                        <div class="input-group input-group-merge mb-6">
                            <span id="basic-icon-default-company2" class="input-group-text"><i
                                    class="icon-base ri ri-building-4-line"></i></span>
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="basic-icon-default-company" class="form-control"
                                    placeholder="ACME Inc." aria-label="ACME Inc."
                                    aria-describedby="basic-icon-default-company2" />
                                <label for="basic-icon-default-company">Company</label>
                            </div>
                        </div>
                        <div class="mb-6">
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="icon-base ri ri-mail-line"></i></span>
                                <div class="form-floating form-floating-outline">
                                    <input type="text" id="basic-icon-default-email" class="form-control"
                                        placeholder="john.doe" aria-label="john.doe"
                                        aria-describedby="basic-icon-default-email2" />
                                    <label for="basic-icon-default-email">Email</label>
                                </div>
                                <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                        <div class="input-group input-group-merge mb-6">
                            <span id="basic-icon-default-phone2" class="input-group-text"><i
                                    class="icon-base ri ri-phone-fill"></i></span>
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                    placeholder="658 799 8941" aria-label="658 799 8941"
                                    aria-describedby="basic-icon-default-phone2" />
                                <label for="basic-icon-default-phone">Phone No</label>
                            </div>
                        </div>
                        <div class="input-group input-group-merge mb-6">
                            <span id="basic-icon-default-message2" class="input-group-text"><i
                                    class="icon-base ri ri-chat-4-line"></i></span>
                            <div class="form-floating form-floating-outline">
                                <textarea id="basic-icon-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"
                                    aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"
                                    style="height: 60px"></textarea>
                                <label for="basic-icon-default-message">Message</label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary">
                            <span class="icon-base ri ri-check-double-line icon-16px me-2"></span>Valider
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
