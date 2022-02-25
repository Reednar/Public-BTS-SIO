using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApplication1
{
    class Chat : Felin
    {
        public Chat() { } // constructeur par défaut
        public Chat(int poids, string coul) // constructeur paramètré
        {
            this.Poids = poids;
            this.Couleur = coul;
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère
        public override void crier()
        {
            Console.WriteLine("je miaule !");
        }
        // méthode redéfinie obligatoirement car abstraite chez la mère

    }
}
