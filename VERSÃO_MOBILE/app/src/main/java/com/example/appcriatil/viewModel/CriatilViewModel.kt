package com.example.appcriatil.viewModel

import androidx.lifecycle.ViewModel
import androidx.lifecycle.asLiveData
import androidx.lifecycle.viewModelScope
import com.example.appcriatil.RoomDB.Usuario
import kotlinx.coroutines.Deferred
import kotlinx.coroutines.async
import kotlinx.coroutines.launch

class CriatilViewModel (private val repository: Repository): ViewModel() {

    fun getUsuario() = repository.getAllUsuario().asLiveData(viewModelScope.coroutineContext)

    fun upsertUsuario(usuario: Usuario) {
        viewModelScope.launch{
            repository.upsertUsuario(usuario)
        }
    }

    fun deleteUsuario(usuario: Usuario) {
        viewModelScope.launch{
            repository.deleteUsuario(usuario)
        }
    }

    suspend fun loginUsuario(emailValue: String, senhaValue: String): List<Usuario> {
        val deferred: Deferred<List<Usuario>> = viewModelScope.async {
            repository.loginUsuario(emailValue, senhaValue)
        }
        return deferred.await()
    }

    suspend fun verificarEmail(emailValue: String):List<Usuario>{
        val deferred: Deferred<List<Usuario>> = viewModelScope.async {
            repository.verificarEmail(emailValue)
        }
        return deferred.await()

    }
    suspend fun verificarLogin():List<Usuario> {
        val deferred: Deferred<List<Usuario>> = viewModelScope.async {
            repository.verificarLogin()
        }
        return deferred.await()
    }
    suspend fun getIdUsuario(idCliente: Int): List<Usuario> {
        val deferred: Deferred<List<Usuario>> = viewModelScope.async {
            repository.getIdUsuario(idCliente)
        }
        return deferred.await()
    }

}