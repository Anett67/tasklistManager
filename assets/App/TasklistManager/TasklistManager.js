import React, { Component } from 'react';
import Tasklists from "./Components/TaskLists/TaskLists";
import Tasklist from "./Components/TasksList/TaskList";

export default class TasklistManager extends Component {
    constructor(props) {
        super(props);

        this.state = {
            taskLists: window.user.tasklists
        }
    }

    componentDidMount() {
        console.log(this.state.taskLists)
    }

    render() {
        const {taskLists} = this.state;

        return <div className="flex">
            <Tasklists lists={taskLists} />
            <Tasklist />
        </div>
    }
}