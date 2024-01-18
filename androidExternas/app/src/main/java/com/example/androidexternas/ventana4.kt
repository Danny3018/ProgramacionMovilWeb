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
import com.example.androidexternas.databinding.ActivityVentana3Binding
import com.example.androidexternas.databinding.ActivityVentana4Binding

class ventana4 : AppCompatActivity() {

    lateinit var Nombretrabajo: EditText
    lateinit var valor: TextView
    lateinit var codigo: EditText

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        val binding= ActivityVentana4Binding.inflate(layoutInflater)
        Nombretrabajo=binding.NombreTrabajo
        valor= binding.valor
        codigo=binding.id


        setContentView(binding.root)
    }

    fun llamarVentanaRegresarMenu(view: View){
        val opcion1= Intent(this,Menu::class.java)
        startActivity(opcion1)
    }


    fun insertar_trabajo (view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/agregarTrabajoMovil.php?nombre="+Nombretrabajo.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response -> valor.text="**" +response.toString()
            },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


    fun borrar_trabajo(view: View){
        //val url="http://192.168.56.1/recibir/agregar_clienteMobil.php?nombre="+enviarnombre.text.toString()
        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/borrarTrabajoMovil.php?codigo="+codigo.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response -> valor.text="**" +response.toString()
            },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }



    fun modificar_trabajo(view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/modificarTrabajoMovil.php?nombre="+Nombretrabajo.text.toString()+"&codigo="+codigo.text.toString()
        val cola= Volley.newRequestQueue(this)
        val StringRequest = StringRequest(
            Request.Method.GET, url, Response.Listener<String>
            {
                    response -> valor.text="**" +response.toString()
            },
            Response.ErrorListener {valor.setText("error")} )

        cola.add(StringRequest)

    }


    fun leer_trabajo(view: View){

        val url="http://192.168.1.14/ProgramacionMovilWeb/Models/leerTrabajoMovil.php"
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