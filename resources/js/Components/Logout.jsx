import React from 'react';

export default function Logout(props) {
  return (
    <div className='flex justify-between px-5 bg-sky-300 items-center'>
      <div>
        <h1>DDHZ</h1>
      </div>
      <div>
        <form onSubmit={props.logoutHandler} className='p-3 flex flex-row gap-5 items-center'>
          <div>
            {props.email}
          </div>
          <div>
            <button className='p-2 bg-red-600 text-white rounded-md hover:bg-red-700'>
              Logout
            </button>
          </div>
        </form>
      </div>
    </div>
  )
}