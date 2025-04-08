<div>
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Duronto Packages</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <button class="btn btn-primary text-sm py-2 px-4" data-bs-toggle="modal" data-bs-target="#ModalOne">
                        Create
                    </button>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->
    <div class="custom-container">
        <!-- Table Wrapper with Rounded Corners and Shadow -->
        <div class="custom-table-wrapper p-4">
            <!-- Top Controls -->
            <div class="entries-dropdown">
                <div class="search-bar d-flex ms-auto">
                    <input type="search" wire:model.live='search' class="form-control text-sm"
                        placeholder="Search..." />
                </div>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Detail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($packages as $index => $package)
                        <tr>
                            <td>
                                <p>{{ $packages->firstItem() + $index }}</p>
                            </td>
                            <td>
                                <p>{{ $package->name }}</p>
                            </td>
                            <td>
                                <p>{{ $package->price }}</p>
                            </td>
                            <td>
                                <p>{{ $package->detail }}</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a type="button" wire:click='edit({{ $package->id }})' class="me-3">
                                        <span>
                                            <i class="lni lni-pencil-alt" style="color:limegreen; font-size: 1rem;"></i>
                                        </span>
                                    </a>
                                    <a type="button" wire:click='delete({{ $package->id }})'
                                        onclick="return confirm('Are you sure you want to delete this package?')">
                                        <span>
                                            <i class="lni lni-trash-can" style="color:red; font-size: 1rem;"></i>
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">
                                <p class="text-danger">No records found.</p>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

            <!-- Footer Info with Top Border -->
            <div class="footer-info">
                <!-- Showing Entries -->
                <span>Showing {{ $packages->firstItem() }} to {{ $packages->lastItem() }} of
                    {{ $packages->total() }} entries</span>

                <!-- Pagination -->
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($packages->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $packages->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Links -->
                    @foreach ($packages->getUrlRange(1, $packages->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $packages->currentPage() ? "active" : "" }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($packages->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $packages->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- ========== tables-wrapper end ========== -->


    <!-- ModalOne start -->
    <div class="follow-up-modal">
        <div wire:ignore.self class="modal fade" id="ModalOne" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 635px;">
                <div class="modal-content p-2">
                    <div class="modal-body">
                        <h4 class="text-center mb-4">{{ $editingPackage ? "Update Package" : "Create Package" }}</h4>
                        <form wire:submit.prevent="{{ $editingPackage ? "update" : "submit" }}">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label text-black text-sm">Name<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-user"></i></span>
                                        <input type="text" wire:model="name" class="form-control text-sm"
                                            id="name" placeholder="Enter name">
                                        @error("name")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label text-black text-sm">Price<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-customer"></i></span>
                                        <input type="text" wire:model="price" class="form-control text-sm"
                                            id="price" placeholder="Enter price">
                                        @error("price")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label text-black text-sm">Detail<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <textarea rows="6" wire:model="detail" class="form-control text-sm" id="detail">
                                        </textarea>
                                        @error("detail")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label text-black text-sm">Status<span
                                            class="text-danger">*</span></label>
                                    <div class="d-flex">
                                        <div class="form-check me-4">
                                            <input class="form-check-input" type="radio" wire:model="status"
                                                value="1" id="status-active">
                                            <label class="form-check-label text-sm" for="status-active">
                                                Active
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="status"
                                                value="0" id="status-inactive">
                                            <label class="form-check-label text-sm" for="status-inactive">
                                                Inactive
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action d-flex flex-wrap justify-content-center">
                                <button type="button" data-bs-dismiss="modal" id="close-modal"
                                    class="main-btn btn-sm primary-btn-outline square-btn btn-hover m-1">
                                    Close
                                </button>
                                <button wire:click="{{ $editingPackage ? "update" : "submit" }}" type="button"
                                    class="main-btn btn-sm primary-btn square-btn btn-hover m-1">
                                    {{ $editingPackage ? "Update" : "Create" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ModalOne End -->

    <script>
        window.addEventListener('open-modal', event => {
            var modal = new bootstrap.Modal(document.getElementById('ModalOne'));
            modal.show();
        });

        window.addEventListener('close-modal', event => {
            console.log('Close modal event triggered');
            var button = document.getElementById("close-modal");
            button.click();

        });
    </script>
</div>
