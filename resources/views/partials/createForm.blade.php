<form action="{{ url('card/create') }}" method="POST">

    {{ csrf_field() }}

    <input type="hidden" name="boardId" value="{{ $board->getId() }}"/>
    <input type="hidden" name="listId" value="{{ $list->getId() }}"/>

    <div class="input-field col m12">
        <input id="name" type="text" class="validate" name="name">
        <label for="name">Name</label>
    </div>
    <div class="input-field col m12">
        <input id="description" type="text" class="validate" name="description">
        <label for="description">Beschreibung</label>
    </div>
    <button type="submit" class="waves-effect waves-light btn">Hinzufügen</button>
</form>