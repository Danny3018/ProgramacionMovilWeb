package com.example.androidexternas

import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.EditText
import android.widget.TextView
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.example.androidexternas.databinding.ActivityMainBinding
import com.example.androidexternas.databinding.ActivityVentana3Binding

class ventana3 : AppCompatActivity() {

    lateinit var codigo: EditText
    lateinit var valor: TextView
    lateinit var Identificacion: EditText
    lateinit var Nombre: EditText
    lateinit var Apellido: EditText
    lateinit var Celular: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding= ActivityVentana3Binding.inflate(layoutInflater)
        codigo=binding.Codigo
        valor= binding.valor
        Identificacion = binding.Identificacion
        Nombre = binding.Nombre
        Apellido = binding.Apellido
        Celular = binding.Celular

        setContentView(binding.root)
    }

    fun llamarVentanaRegresarMenu(view: View){
        val opcion1= Intent(this,Menu::class.java)
        startActivity(opcion1)
    }




    fun insertar_trabajador (view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/agregarTrabajadorMovil.php?nombre="+Nombre.text.toString()+"&apellido="+Apellido.text.toString()+"&identificacion="+
                Identificacion.text.toString()+"&celular="+Celular.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


    fun borrar_trabajador(view: View){
        //val url="http://192.168.56.1/recibir/agregar_clienteMobil.php?nombre="+enviarnombre.text.toString()
        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/borrarTrabajadorMovil.php?codigo="+codigo.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }



    fun modificar_trabajador(view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/modificarTrabajadorMovil.php?nombre="+Nombre.text.toString()+"&apellido="+Apellido.text.toString()+"&identificacion="+
                Identificacion.text.toString()+"&celular="+Celular.text.toString()+"&codigo="+codigo.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


    fun leer_trabajador(view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/leerTrabajadoresMovil.php"
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
        {
                response -> valor.text="**" +response.toString()
        },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


}