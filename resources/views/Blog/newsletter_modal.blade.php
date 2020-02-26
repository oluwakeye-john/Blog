<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Material input -->
            <form method="post" action="{{ route('subscribe') }}">
                @csrf
                <div class="container">
                    <div class="md-form">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="inputIconEx1" name="email" class="form-control" required>
                        <label for="inputIconEx1">E-mail address</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
    </div>
</div>
