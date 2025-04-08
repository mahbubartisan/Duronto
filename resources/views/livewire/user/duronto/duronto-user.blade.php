<div>

    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Duronto User List</h2>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <a href="{{ route("duronto.user.create") }}" class="btn btn-primary text-sm py-2 px-4">
                        Create
                    </a>
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
                    <input type="search" wire:model.live='search' class="form-control text-sm" placeholder="Search..." />
                </div>
            </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $index => $customer)
                        <tr>
                            <td>
                                <p>{{ $index + 1 }}</p>
                            </td>
                            <td>
                                <p>{{ $customer->name }}</p>
                            </td>
                            <td>
                                <p>{{ $customer->email }}</p>
                            </td>
                            <td>
                                <p>{{ $customer->phone }}</p>
                            </td>
                            <td>
                                <p>{{ $customer->address }}</p>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('duronto.user.edit', ['id' => $customer->id]) }}" class="me-3">
                                        <span>
                                            <i class="lni lni-pencil-alt" style="color:limegreen; font-size: 1rem;"></i>
                                        </span>
                                    </a>
                                    <a type="button" wire:click='delete({{ $customer->id }})'>
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
                <span>Showing {{ $customers->firstItem() }} to {{ $customers->lastItem() }} of
                    {{ $customers->total() }} entries</span>

                <!-- Pagination -->
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($customers->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $customers->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Pagination Links -->
                    @foreach ($customers->getUrlRange(1, $customers->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $customers->currentPage() ? "active" : "" }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($customers->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $customers->nextPageUrl() }}">Next</a>
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
    {{-- <div class="follow-up-modal">
        <div wire:ignore.self class="modal fade" id="ModalOne" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 635px;">
                <div class="modal-content p-2">
                    <div class="modal-body">
                        <h4 class="text-center mb-4">{{ $editingUser ? "Update User" : "Create User" }}
                        </h4>
                        <form wire:submit.prevent="{{ $editingUser ? "update" : "submit" }}">
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
                                    <label for="email" class="form-label text-black text-sm">Email<span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-envelope"></i></span>
                                        <input type="text" wire:model="email" class="form-control text-sm"
                                            id="email" placeholder="Enter email">
                                        @error("email")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label text-black text-sm">Mobile NO. <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-phone"></i></span>
                                        <input type="text" wire:model="phone" class="form-control text-sm"
                                            id="phone" placeholder="Enter phon number">
                                        @error("phone")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label text-black text-sm">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-key"></i></span>
                                        <input type="password" wire:model="password" class="form-control text-sm"
                                            id="password" placeholder="Enter password">
                                        @error("password")
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
                                <button wire:click="{{ $editingUser ? "update" : "submit" }}" type="button"
                                    class="main-btn btn-sm primary-btn square-btn btn-hover m-1">
                                    {{ $editingUser ? "Update" : "Create" }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ModalOne End -->

    <script>
        window.addEventListener('open-modal', event => {
            var modal = new bootstrap.Modal(document.getElementById('ModalOne'));
            modal.show();
        });

        // window.addEventListener('close-modal', event => {
        //     var modal = new bootstrap.Modal(document.getElementById('ModalOne'));
        //     modal.hide();
        // });

        window.addEventListener('close-modal', event => {
            console.log('Close modal event triggered');
            var button = document.getElementById("close-modal");
            button.click();

        });
    </script>
</div>
