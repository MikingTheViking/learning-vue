<template>

    <div id="todo-list-example">
        <input 
            v-model="newTodoText"
            v-on:keyup.enter="addNewTodo"
            placeholder="Add a todo"
        />
        <ul>
            <li
                is="simple-todo-list-item"
                v-for="(todo, index) in todos"
                v-bind:key="todo.id"
                v-bind:title="todo.title"
                v-on:remove="todos.splice(index, 1)"
            ></li>
        </ul>
    </div>
    
</template>

<script>

    import SimpleTodoListItem from './SimpleTodoListItem.vue';

    export default {

        data() {

            return {

                title: 'Simple Todo List',
                newTodoText: '',
                todos: [
                    {
                        id: 1,
                        title: 'do something.'
                    }
                ],
                nextTodoId: 2
            };
        },
        methods: {
            addNewTodo: function () {
                this.todos.push({
                    id: this.nextTodoId++,
                    title: this.newTodoText
                });
                this.newTodoText = '';
            }
        },
        components: {
            'simple-todo-list-item': SimpleTodoListItem
        }
    }

</script>

<style lang="scss">
</style>