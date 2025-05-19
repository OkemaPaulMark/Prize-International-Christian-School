<!-- Edit Modal -->
<div class="modal fade" id="editBoardMemberModal{{ $member->id }}" tabindex="-1" role="dialog" aria-labelledby="editBoardMemberModalLabel{{ $member->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('board-members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Board Member</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Full Name*</label>
                        <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title*</label>
                        <input type="text" name="title" class="form-control" value="{{ $member->title }}" required>
                    </div>

                    <!-- Phone -->
                    <div class="form-group">
                        <label for="phone_number">Phone Number*</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ $member->phone_number }}" required>
                    </div>

                    <!-- Current Image -->
                    <div class="form-group">
                        <label>Current Image</label><br>
                        <img src="{{ asset($member->image) }}" width="100" class="img-thumbnail">
                    </div>

                    <!-- New Image -->
                    <div class="form-group">
                        <label for="image">Replace Image (optional)</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Board Member</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>

            </div>
        </form>
    </div>
</div>
