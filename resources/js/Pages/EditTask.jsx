import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-react';

export default function EditTask(props) {
  console.log(props);

  const maxInput = props.maxTaskInput;
  const [value, setValue] = useState(props.data[0].task_description);
  const [category, setCategory] = useState(props.data[0].category);

  const handleAddTask = (e) => {
    e.preventDefault();
    const data = {
      'task_description': value,
      category,
      'id':props.data[0].id,
    }
    Inertia.put('/updateTask', data)
    setValue('');
    setCategory('General');
  }

  return (
    <div className='flex w-[100vw] justify-center'>
      <div className={`todo-list`}>
        <p className='text-center pb-5 font-bold text-2xl'>Update Data</p>
        <form onSubmit={handleAddTask} className='flex flex-col p-5'>
            <input
              type="text"
              className=""
              value={value}
              onChange={e => setValue(e.target.value)}
              required
              maxLength={maxInput}
            />
            Max Length: {value.length}/{maxInput}

            <select className="" value={category} onChange={e => setCategory(e.target.value)}>
              <option value="General">General</option>
              <option value="Office">Office</option>
              <option value="School">School</option>
              <option value="Home">Home</option>
            </select>

            <button type="submit" className="add-button">Update</button>
            <Link as='Button' href={route('index')} className='bg-blue-500 rounded-xl p-3 hover:bg-blue-400'>
              Back
            </Link>
        </form>

      </div>
    </div>
  )
}

// <form onSubmit={handleAddTask}>
//   <div className="input-container">
//     <input
//       type="text"
//       className="input"
//       value={value}
//       onChange={e => setValue(e.target.value)}
//       required
//       maxLength={maxInput}
//     />

//     <select className="category-dropdown" value={category} onChange={e => setCategory(e.target.value)}>
//       <option value="Anywhere">General</option>
//       <option value="Office">Office</option>
//       <option value="School">School</option>
//       <option value="Home">Home</option>
//     </select>

//     <button type="submit" className="add-button">Update</button>
//   </div>
//   <div className=''>
//     Max Length: {value.length}/{maxInput}
//   </div>
// </form>