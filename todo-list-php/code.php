<div id="taskModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
    background:rgba(0,0,0,0.6); justify-content:center; align-items:center;">
    <div style="background:white; padding:20px; border-radius:10px; width:300px; position:relative;">
        <h3>Add Task</h3>
        <form id="taskForm" method="post" action="tasks/add.php">
            <input type="hidden" name="list_id" id="modalListId">
            <input type="text" name="task_name" placeholder="Task name" required><br><br>
            <button type="submit">Add</button>
            <button type="button" onclick="closeModal()">Cancel</button>
        </form>
    </div>
</div>


<script>
    function openModal(listId) {
        document.getElementById("modalListId").value = listId;
        document.getElementById("taskModal").style.display = "flex"; // make it appear
    }

    function closeModal() {
        document.getElementById("taskModal").style.display = "none";
    }
</script>
