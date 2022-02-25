using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    public abstract class Animal
    {
        private int poids;
        private string couleur;

        //accesseurs
        protected int Poids
        {
            get { return poids; }
            set { poids = value; }
        }
        protected string Couleur
        {
            get { return couleur; }
            set { couleur = value; }
        }

        private string boire()
        {
            return "Je bois de l'eau\n";
        }

        private string manger()
        {
            return "Je mange de la viande";
        }

        // les deux méthodes suivantes n'ont pas de code
        // donc elles sont abstraites et devront obligatoirement
        // être redéfinies dans les classes filles

        public abstract void deplacement();
        public abstract void crier();

        public override String ToString()
        {
            string str = "Je suis un objet de la classe " + this.GetType().Name +"\n";
            str += "je suis " + this.couleur + " et je pèse " + this.poids + " kilos\n";
            str += this.boire();
            str += this.manger();
            return str;     
        }
    }
}
