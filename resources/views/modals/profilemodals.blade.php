 <div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog ">
         <div class="modal-content rounded-0">
             <form action="{{ route('update_profile') }}" method="POST" class="w-100 d-flex flex-column  gap-3">
                 @csrf
                 @method('PUT')
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Updating Profile Details</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body w-100 d-flex flex-column gap-3">
                     <input type="text" name="id" id="update_id" hidden>
                     <div class="d-flex flex-column gap-2">
                         <label for="name">Name</label>
                         <input required type="name" name="name" id="update_name" placeholder="John Doe"
                             class="form-control">
                     </div>
                     <div class="d-flex flex-column gap-2">
                         <label for="email">Email</label>
                         <input required type="email" name="email" id="update_email" placeholder="john@doe.com"
                             class="form-control">
                     </div>
                     <p class="d-inline-flex gap-1">
                         <a class="btn btn-outline-tertiary" data-bs-toggle="collapse" href="#collapseExample"
                             role="button" aria-expanded="false" aria-controls="collapseExample">Change password</a>

                     </p>
                     <div class="collapse" id="collapseExample">
                         <div class="d-flex flex-column gap-2">
                             <label for="content">New Password</label>
                             <input type="password" name="password" id="update_password" placeholder="********"
                                 class="form-control">
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary rounded-0">Update Profile</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content rounded-0">
             <form action="{{ route('delete_profile') }}" method="POST" class="w-100 d-flex flex-column  gap-3">
                 @csrf
                 @method('POST')
                 <div class="modal-body">
                     <h2>You are about to delete your account!</h2>
                     <p>Please note that this action cannot be reversed!</p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-danger rounded-0">Delete Account</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
