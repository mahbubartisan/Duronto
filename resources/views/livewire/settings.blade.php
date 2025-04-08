<div>

    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title">
                    <h2>Settings List</h2>
                </div>
            </div>
            <!-- end col -->
            {{-- <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                    <button class="btn btn-primary text-sm py-2 px-4" data-bs-toggle="modal"
                        data-bs-target="#ModalOne">
                        Create
                    </button>
                </div>
            </div> --}}
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <!-- ========== tables-wrapper start ========== -->

    <table>
        <thead>
            <tr>
                <th>আইটেম</th>
                <th>এমাউন্ট</th>
                <th>অ্যাকশন</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)
                <tr>
                    <td>{{ $setting->name }}</td>
                    <td>{{ $setting->amount }}</td>
                    <td>
                        <button type="button" class="btn btn-primary text-xs py-1 px-3" wire:click="edit({{ $setting->id }})"
                            data-bs-toggle="modal" data-bs-target="#ModalOne">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- ========== tables-wrapper end ========== -->

    <!-- ModalOne start -->
    @if ($editItem)
        <div class="follow-up-modal">
            <div wire:ignore.self class="modal fade show d-block" id="ModalOne" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 635px;">
                    <div class="modal-content p-2">
                        <div class="modal-body">
                            <h4 class="text-center mb-4">{{ $editItem->name }}</h4>
                            <form wire:submit.prevent='submit'>
                                <div class="row mb-3">
                                    <label for="editAmount" class="form-label text-black">
                                        Amount<span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="lni lni-customer"></i></span>
                                        <input type="text" class="form-control" wire:model="editAmount"
                                            id="editAmount">
                                        @error("editAmount")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="action d-flex flex-wrap justify-content-center">
                                    <button type="button"
                                        class="main-btn btn-sm primary-btn-outline square-btn btn-hover m-1"
                                        wire:click="resetEdit" data-bs-dismiss="modal">Close</button>
                                    <button wire:click='update' type="button"
                                        class="main-btn btn-sm primary-btn square-btn btn-hover m-1">
                                        Update
                                    </button>
                                </div>
                            </form>
                            <!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- ModalOne End -->








    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        td {
            background-color: #ffffff;
        }

        /* Add striped effect */
        tbody tr:nth-child(odd) td {
            background-color: #f2f2f2;
            /* Light gray for odd rows */
        }

        tbody tr:nth-child(even) td {
            background-color: #ffffff;
            /* White for even rows */
        }

        .edit-btn {
            background-color: #e7e7e7;
            border: 1px solid #ddd;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
        }

        .edit-btn:hover {
            background-color: #ddd;
        }
    </style>
</div>
