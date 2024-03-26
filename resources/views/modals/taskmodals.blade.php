 <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <form action="{{ route('update_task') }}" method="POST" class="w-100 d-flex flex-column  gap-3">
                 @csrf
                 @method('PUT')
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body w-100 d-flex flex-column gap-3">
                     <input type="text" name="id" id="update_id" hidden>
                     <div class="d-flex flex-column gap-2">
                         <label for="title">Update Task</label>
                         <input required type="title" name="title" id="update_title" placeholder="Update footer"
                             class="form-control">
                     </div>
                     <div class="d-flex flex-column gap-2">
                         <label for="content">Details</label>
                         <textarea required rows="4" type="content" name="content" id="update_content"
                             placeholder="Change text color and remove broken link!" class="form-control"></textarea>
                     </div>
                     <div class="d-flex flex-column gap-2">
                         <label for="password">Status</label>
                         <select name="status" id="update_status" class="form-control">
                             <option value="Pending">Pending</option>
                             <option value="Todo">Todo</option>
                             <option value="Done">Done</option>
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <form action="{{ route('submit_task') }}" method="POST" class="w-100 d-flex flex-column  gap-3">
                 @csrf
                 @method('POST')
                 <div class="modal-header">
                     <h1 class="modal-title fs-5" id="exampleModalLabel">Create a New Task</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body w-100 d-flex flex-column gap-3">
                     <div class="d-flex flex-column gap-2">
                         <label for="title">Task Title</label>
                         <input required type="title" name="title" placeholder="Update footer" class="form-control">
                     </div>
                     <div class="d-flex flex-column gap-2">
                         <label for="content">Details</label>
                         <textarea required rows="4" type="content" name="content" placeholder="Change text color and remove broken link!"
                             class="form-control"></textarea>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary">Create Task</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
